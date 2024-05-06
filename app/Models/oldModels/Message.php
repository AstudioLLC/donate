<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\Cache;

class Messagee extends AbstractModel
{

    /**
     * @return mixed
     */
    public static function adminList()
    {
        return self::orderBy('id', 'desc')->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getItem($id)
    {
        $result = self::where('id', $id)->first();
        if (!$result) abort(404);

        return $result;
    }

    /**
     * @param $model
     * @param $inputs
     * @return bool
     */
    public static function action($model, $inputs)
    {
        //dd($model, $inputs);
        //self::clearCaches();
        if (empty($model)) {
            $model = new self;
            $ignore = false;
            $action = 'add';
        } else {
            $ignore = $model->id;
            $action = 'edit';
        }
        $model->page = $inputs['page'];
        $message = json_encode($inputs);
        $model->message = $message;

        /*merge_model($inputs,
            $model,
            [
                'page',
                'message'
            ]
        );*/

        if (request()->file('file')) {
            self::deleteItemFile($action, $model->name);
            $image = upload_file($inputs['file'], 'u/message/',  $action == 'edit' ? $model->file : false);
            $model->file = $image;
        }

        return $model->save();
    }

    /**
     * @param $model
     * @return mixed
     * @throws Exception
     */
    public static function deleteItem($model)
    {
        self::clearCaches();

        try {
            (new File)->delete(public_path('u/message/') . $model->name);
        } catch (Exception $e) {
        }

        return $model->delete();
    }

    /**
     * @param $action
     * @param $image
     */
    public static function deleteItemFile($action, $image)
    {
        if ($action == 'edit' && !empty($image)){
            try {
                (new File)->delete(public_path('u/message/') . $image);
            } catch (Exception $e) {
            }
        }
    }

    /**
     * @return mixed
     */
    public static function siteList(){
        return Cache::rememberForever(self::cacheKey(), function(){
            self::clearCaches();
            return self::where('active', 1)->sort()->get();
        });
    }

    /**
     * @return mixed
     */
    public static function homeList(){
        return Cache::rememberForever(self::cacheKeyHome(), function(){
            self::clearCaches();
            return self::where('active', 1)->sort()->limit(3)->get();
        });
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function getItemSite($url) {
        return self::where(['url' => $url, 'active' => 1])->firstOrFail();
    }
}
