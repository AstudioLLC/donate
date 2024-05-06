<?php

namespace App\Models;

use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use App\Traits\HasAlias;
use App\Traits\HasImage;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use App\Traits\UrlUnique;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * Class Category
 * @property int|null $parent_id
 * @property int $id
 * @property Collection $items
 * @property bool $is_footer
 * @property bool $is_home
 * @property int $deep
 * @property Image|null $image
 * @package App\Models
 *
 * @method static Builder whereDeep($deep)
 */
class Categoryy extends AbstractModel
{
    use HasTranslations, UrlUnique, Sortable, HasAlias, HasImage;

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 360,
            'height' => 210,
            'entityPath' => 'categories',
            'size' => 'small',
        ]
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'name',
        'seo_title',
        'description',
        'seo_description',
        'seo_keywords'
    ];

    /**
     * @var string
     */
    protected $aliasSource = 'name';

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var mixed
     */
    protected $demo_id;

    /**
     * @var string[]
     */
    protected $with = [
        'image'
    ];

    /**
     * @var Collection $nestedParents
     */
    private $nestedParents;

    /**
     * @param Request $request
     * @return bool
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function fillRequest(Request $request)
    {
        $this->setTranslations('name', $request->input('name'));
        $this->is_footer = $request->has('is_footer');
        $this->is_home = $request->has('is_home');
        if ($request->has('parent_id')) {
            $this->parent()->associate($request->input('parent_id'));
        }

        $this->generateAlias();
        $this->setCategoryDeep();

        if (!$this->save()) {
            return false;
        }

        if ($request->hasFile('image')) {
            if ($this->image) {
                $this->image->delete();
            }

            $name = ImageUploader::upload($request->file('image'), static::$imageSizes);

            $this->image()->create([
                'name' => $name,
                'title' => $this->getRawOriginal('name'),
                'alt' => $this->getRawOriginal('name'),
            ]);
        }

        return true;
    }

    /**
     * @param $model
     * @return false
     */
    public static function deleteImage($model)
    {
        $storage = StorageDriver::instance();

        if ($model->image) {
            foreach (static::$imageSizes as $sizeData) {
                $path = sprintf('%s/%s/%s', Arr::get($sizeData, 'entityPath', ''), Arr::get($sizeData, 'size', ''), $model->image->name);
                $storage->delete($path);
            }
            return $model->image->delete();
        }

        return false;
    }

    /**
     * @return BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * @return void
     */
    protected function setCategoryDeep()
    {
        $this->deep = count($this->getNestedParents());
    }

    /**
     * @param false $reverseResult
     * @return Collection
     */
    public function getNestedParents($reverseResult = true): Collection
    {
        $this->nestedParents = new Collection();

        $result = $this->getParentsRecursively($this->parent_id);

        if ($reverseResult) {
            $result = $result->reverse();
        }

        return $result;
    }

    /**
     * @param $id
     * @return Collection
     */
    protected function getParentsRecursively($id)
    {
        $this->demo_id = $id;
        $i = true;

        while ($i == true) {
            /** @var Category $parentModel */
            $parentModel = $this->query()->where(['id' => $this->demo_id])->with(['parent'])->first();
            if ($parentModel) {
                $this->nestedParents->push($parentModel);
                $this->getParentsRecursively($parentModel->parent_id);
            } else {
                $i = false;
            }
        }

        return $this->nestedParents;
    }

    /**
     * @return HasMany
     */
    public function items()
    {
        return $this->hasMany(Item::class, 'category_id')->where('active','=', 1);
    }

    /**
     * @return HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->with('children')->withCount('items')->orderBy('ordering', 'asc');
    }

    /**
     * @return BelongsToMany
     */
    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'category_filter_relations', 'category_id', 'filter_id')->with('criteria');
    }

    /**
     * @param Builder $query
     * @param $value
     * @return Builder
     */
    public function scopeWhereDeep(Builder $query, $value)
    {
        return $query->where('deep', $value);
    }

    /**
     * @return array[]
     */
    public function getImageSizes()
    {
        return static::$imageSizes;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return asset('storage/media/categories/small/' . $this->image->name);
    }
}
