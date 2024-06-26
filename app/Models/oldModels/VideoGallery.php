<?php

namespace App\Models;

use App\Traits\Sortable;

class VideoGalleryy extends AbstractModel
{
    use Sortable;

    public $timestamps = false;

    public static function adminList($gallery, $key = null)
    {
        return self::sort()->where(['gallery' => $gallery, 'key' => $key])->get();
    }

    public static function action($model, $inputs)
    {
        if (empty($model)) {
            $model = new self;
            $model['gallery'] = $inputs['gallery'];
            $model['key'] = $inputs['key'];
        }
        $model['active'] = (int)!empty($inputs['active']);
        $model['video'] = preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $inputs['video'], $video) ? $video[1] : $inputs['video'];

        return $model->save();
    }

    public static function getItem($id)
    {
        return self::query()->findOrFail($id);
    }

    public static function deleteItem($model)
    {
        return $model->delete();
    }

    public static function get($gallery, $key = null)
    {
        return self::sort()->select('video')->where(['gallery' => $gallery, 'key' => $key, 'active' => 1])->get();
    }

    public static function clear($gallery, $key = null)
    {
        return self::query()->where(['gallery' => $gallery, 'key' => $key])->delete();
    }

}
