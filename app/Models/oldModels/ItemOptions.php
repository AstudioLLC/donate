<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\InsertOrUpdate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class ItemOptionss extends AbstractModel
{
    use HasFactory, HasTranslations, InsertOrUpdate;

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'item_options';

    /**
     * @var string[]
     */
    public $translatable = [
        'name',
        'value'
    ];

    public static function action($id = null, Request $request)
    {
        $itemOptions = self::where(['item_id' => $id])->delete();
        if (!empty($request->input('options'))){
            foreach ($request->input('options')['name'] as $row => $option) {
                $model = new self;
                $insertData = [
                    'name' => $option,
                    'value' => $request->input('options')['value'][$row],
                    'item_id' => $id,
                ];
                merge_model($insertData, $model, ['name', 'value', 'item_id']);
                $model->save();
            }
        }
    }
}
