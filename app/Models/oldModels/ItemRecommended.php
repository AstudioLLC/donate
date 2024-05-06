<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\InsertOrUpdate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class ItemRecommendedd extends AbstractModel
{
    use HasFactory, InsertOrUpdate;

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'item_recommended_references';

    public static function action($id = null, Request $request)
    {
        $itemRecommended = self::query()->where(['item_id' => $id])->delete();
        if (!empty($request->input('recommended'))){
            foreach ($request->input('recommended') as $row => $value) {
                $model = new self;
                $model->item_id = $id;
                $model->recommended_id = $value;
                $model->save();
            }
        }
    }
}
