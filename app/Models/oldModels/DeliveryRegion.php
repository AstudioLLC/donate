<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;

class DeliveryRegionn extends AbstractModel
{
    use HasTranslations, Sortable;

    public $timestamps = false;

    /**
     * @var string[]
     */
    public $translatable = [
        'title'
    ];

    public static function adminList()
    {
        return self::sort()->withCount('cities')->get();
    }

    public static function action($model, $inputs)
    {
        if (empty($model)) {
            $model = new self;
            $ignore = false;
            $action = 'add';
            $model['ordering'] = $model->sortValue();
        } else {
            $ignore = $model->id;
            $action = 'edit';
        }

        merge_model($inputs,
            $model,
            [
                'title'
            ]
        );

        return $model->save();
    }

    public static function deleteItem($model)
    {
        if ($model) {
            DeliveryCity::where('region_id', $model->id)->delete();
        }
        return $model->delete();
    }

    public static function getItem($id)
    {
        return self::findOrFail($id);
    }

    public static function siteList()
    {
        return self::whereHas('cities')->with('cities')->get();
    }

//    public static function jsonForRegions($countries){
//        return $countries->mapWithKeys(function($item){
//            return [
//                $item->id => $item->regions->map(function($item){
//                    return ['id'=>$item->id, 'title'=>$item->title];
//                })
//            ];
//        });
//    }

    public function cities()
    {
        return $this->hasMany('App\Models\DeliveryCity', 'region_id', 'id')->sort();
    }

    /*public function scopeSort($q)
    {
        return $q->orderBy('title', 'asc');
    }*/
}
