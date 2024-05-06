<?php

namespace App\Models;


use App\Traits\HasTranslations;
use App\Traits\Sortable;

class ColorFilterr extends AbstractModel
{
    use HasTranslations, Sortable;

    public $translatable = ['name'];

    public static function editFilter($id, array $data)
    {
        $model = self::query()->where('id', $id)->first();

        $model->setTranslations('name', $data['name'] ?? []);
        $model->hex_color = $data['hex_color'];

        return $model->save();
    }

    public function addFilter(array $data)
    {
        $filter = new static();

        $filter->setTranslations('name', $data['name'] ?? '');
        $filter->hex_color = $data['hex_color'];

        return $filter->save();
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'color_filters_relations', 'filter_id', 'item_id');
    }
}
