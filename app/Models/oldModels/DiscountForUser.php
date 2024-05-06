<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\UrlUnique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class DiscountForUserr extends Model
{
    use HasTranslations, UrlUnique;

    public $timestamps = false;

    public $translatable = ['title'];

    public static function getNews()
    {
        return Cache::rememberForever(self::cacheKey(), function () {
            self::clearCaches();
            return self::select('title', 'discount')->get();
        });
    }

    private static function cacheKey()
    {
        return 'discountForUser';
    }

    public static function adminList()
    {
        return self::select('id', 'title', 'discount')->get();
    }

    public static function action($model, $inputs)
    {
        self::clearCaches();
        if (empty($model)) {
            $model = new self;
        }

        merge_model($inputs, $model, ['title']);
        $model->discount = $inputs['discount'];

        return $model->save();
    }

    public static function clearCaches()
    {
        Cache::forget(self::cacheKey());
    }

    public static function getItem($id)
    {
        return self::findOrFail($id);
    }


    public static function deleteItem($model)
    {
        self::clearCaches();

        return $model->delete();
    }
}
