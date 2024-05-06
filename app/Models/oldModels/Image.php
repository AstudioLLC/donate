<?php

namespace App\Models;

use App\Services\ImageUploader\Drivers\StorageDriver;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;

/**
 * Class Image
 * @package App\Models
 *
 * @property Item|AbstractModel $imageable
 * @property string $name
 * @property string $title
 * @property string $alt
 */
class Imagee extends Model
{
    use HasTranslations;

    /**
     * @var array
     */
    protected $fillable = ['name', 'title', 'alt'];

    /**
     * @var string[]
     */
    protected $translatable = [
        'title',
        'alt'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Image $image) {
            $storageDriver = StorageDriver::instance();

            foreach ($image->imageable->getImageSizes() as $sizeData) {
                if (empty($sizeData['path'])) {
                    continue;
                }

                $storageDriver->delete(sprintf('%s/%s', Arr::get($sizeData, 'path', ''), $image->name));
            }
            $storageDriver->delete(sprintf('original/%s', $image->name));
        });
    }

    /**
     * @return MorphTo
     */
    public function imageable()
    {
        return $this->morphTo(__FUNCTION__, 'model_type', 'model_id');
    }
}
