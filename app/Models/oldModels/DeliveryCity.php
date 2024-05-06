<?php

namespace App\Models;

use App\Traits\HasTranslations;

class DeliveryCityy extends AbstractModel
{
    use HasTranslations;

    public $timestamps = false;

    /**
     * @var string[]
     */
    public $translatable = [
        'title'
    ];

    protected $casts = [
        'price' => 'integer',
    ];

    public static function action($model, $inputs)
    {
        if (!$model) {
            $model = new self;
            $model['region_id'] = $inputs['region_id'];
        }
        $model['price'] = $inputs['price'];
        $model['min_price'] = $inputs['min_price'];

        merge_model($inputs,
            $model,
            [
                'title'
            ]
        );

        return $model->save();
    }

    public static function getItem($id)
    {
        return self::findOrFail($id);
    }

    public function region()
    {
        return $this->belongsTo('App\Models\DeliveryRegion', 'region_id', 'id');
    }

    public function scopeSort($q)
    {
        return $q->orderBy('id', 'desc');
    }

    public static function deleteItem($model)
    {
        return $model->delete();
    }
}
