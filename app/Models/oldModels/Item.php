<?php

namespace App\Models;

use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Services\ImageUploader\ImageUploader;
use App\Traits\HasAlias;
use App\Traits\HasImage;
use App\Traits\HasTranslations;
use App\Traits\InsertOrUpdate;
use App\Traits\Sortable;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Item
 * @package App\Models
 *
 * @property boolean $active
 * @property mixed $code
 * @property integer $count
 * @property integer $collection_id
 * @property string $alias
 * @property double $price
 * @property double $bulk_price
 * @property double $discount
 * @property Image|null $image
 * @property bool $is_new
 * @property bool $is_promotion
 */
class Itemm extends AbstractModel
{
    use HasTranslations, Sortable, InsertOrUpdate, HasAlias, HasImage;

    /**
     * @var string[]
     */
    protected $with = [
        'image'
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'short_description',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'unit_of_measurement',
    ];

    /**
     * @var
     */
    public $filtersLoaded;

    /**
     * @var string
     */
    protected $aliasSource = 'title';

    /**
     * @var string[]
     */
    protected $appends = [
        'realPrice'
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 800,
            'height' => 800,
            'entityPath' => 'items',
            'size' => 'thumbnail',
        ],
        [
            'width' => 270,
            'height' => 270,
            'entityPath' => 'items',
            'size' => 'small',
        ]
    ];

    /**
     * @param $id
     * @return mixed
     */
    public static function getItem($id)
    {
        $result = self::where(['id' => $id, 'active' => 1])->first();
        if (!$result) abort(404);

        return $result;
    }

    /**
     * @return float|int
     */
    public function getRealPriceAttribute()
    {
        return $this->price / (1 - $this->discount / 100);
    }

    /**
     * @param Request $request
     * @return bool
     * @throws Exception
     */
    public function fillRequest(Request $request)
    {
        $this->setTranslations('title', $request->input('title'));
        $this->code = $request->input('code');
        $this->count = $request->input('count');
        $this->active = $request->has('active');
        $this->is_new = $request->has('is_new');
        $this->is_promotion = $request->has('is_promotion');
        $this->setTranslations('unit_of_measurement', $request->input('unit_of_measurement'));

        if ($request->has('generate_url')) {
            $this->generateAlias($request->input('code'));
        } else {
            $this->alias = $request->input('alias');
        }

        $this->setTranslations('short_description', $request->input('short'));
        $this->setTranslations('description', $request->input('description'));
        $this->setDiscountedPrice($request->input('price'), $request->input('discount'));

        if ($request->input('bulk_price') !== null) {
            $this->bulk_price = $request->input('bulk_price');
            //$this->setDiscountedBulkPrice($request->input('bulk_price'), $request->input('discount'));
        } else {
            if ($request->input('price') !== null) {
                $this->bulk_price = $request->input('price');
            } else {
                $this->bulk_price = $request->input('bulk_price');
            }
        }
        $this->discount = $request->input('discount');
        $this->setTranslations('seo_title', $request->input('seo_title'));
        $this->setTranslations('seo_description', $request->input('seo_description'));
        $this->category()->associate($request->input('category'));
        $this->collection_id = $request->input('collection');
        $this->author()->associate(authUser()->id);

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
                'title' => $this->getRawOriginal('title'),
                'alt' => $this->getRawOriginal('title'),
            ]);
        }

        DB::table('item_brands_relations')->where('item_id', $this->id)->delete();
        if ($request->input('brand') !== null) {
            $inserts_brands = [
                'item_id' => $this->id,
                'brand_id' => $request->input('brand')
            ];
            DB::table('item_brands_relations')->insert($inserts_brands);
        }

        ItemOptions::action($this->id, $request);

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
     * @param $price
     * @param $discount
     */
    public function setDiscountedPrice($price, $discount)
    {
        $this->price = $price - ($price * $discount / 100);
    }

    /**
     * @param $bulk_price
     * @param $discount
     */
    public function setDiscountedBulkPrice($bulk_price, $discount)
    {
        $this->bulk_price = $bulk_price - ($bulk_price * $discount / 100);
    }

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return BelongsToMany
     */
    public function criteria()
    {
        return $this->belongsToMany(Criterion::class, 'item_criterion_references', 'item_id', 'criterion_id');
    }

    /**
     * @param string $size
     * @return string
     */
    public function getImageUrl($size = ''): string
    {
        if (!$this->image) {
            return '';
        }

        $size = '/items/' . $size;

        return asset(sprintf('storage/media%s/%s', $size, $this->image->name));
    }

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    /**
     * @return array[]
     */
    public function getImageSizes()
    {
        return static::$imageSizes;
    }

    /**
     * @return BelongsToMany
     */
    public function colorFilters()
    {
        return $this->belongsToMany(ColorFilter::class, 'color_filters_relations', 'item_id', 'filter_id');
    }

    /**
     * @return BelongsToMany
     */
    public function countryFilters()
    {
        return $this->belongsToMany(CountryFilter::class, 'country_filters_relations', 'item_id', 'filter_id');
    }

    /**
     * @return HasMany
     */
    public function options()
    {
        return $this->hasMany(ItemOptions::class, 'item_id');
    }

    /**
     * @return HasMany
     */
    public function recommended()
    {
        return $this->hasMany(ItemRecommended::class, 'item_id');
    }

    /**
     * @return BelongsToMany
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'item_brands_relations', 'item_id', 'brand_id');
    }
}
