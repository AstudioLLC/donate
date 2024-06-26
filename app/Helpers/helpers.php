<?php

use App\Models\User;
use App\Registries\UserRegistry;
use App\Services\Banners\BannerManager;
use App\Services\FileManager\Facades\FileManager;
use App\Services\PageManager\Facades\PageManager;
use App\Services\Support\Str;
use App\Services\LanguageManager\Facades\LanguageManager;

if (!function_exists('randomImageName')) {
    function randomImageName($ext, $length = 18)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString . '.' . $ext;
    }
}

if (!function_exists('clear_dir')) {
    function clear_dir($dir)
    {
        if (file_exists($dir) && is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . $object) && !is_link($dir . "/" . $object))
                        clear_dir($dir . $object);
                    else
                        unlink($dir . '/' . $object);
                }
            }
        }
    }
}

if (!function_exists('to_url_suf')) {
    function to_url_suf($string)
    {
        return to_url($string) . '-' . mt_rand(1000, 9999);
    }
}
if (!function_exists('aApp')) {
    function aApp($asset, $add_version = false)
    {
        $path = 'assets/' . $asset;
        if (!empty($add_version)) $path .= '?v=' . config('app.version');

        return asset($path);
    }
}
if (!function_exists('aAdmin')) {
    function aAdmin($asset, $add_version = false)
    {
        $path = 'cms/' . $asset;
        if (!empty($add_version)) $path .= '?v=' . config('app.version');

        return asset($path);
    }
}
if (!function_exists('aSite')) {
    function aSite($asset, $add_version = false)
    {
        $path = $asset;
        if (!empty($add_version)) $path .= '?v=' . config('app.version');

        return asset($path);
    }
}
//endregion
//region Variables
if (!function_exists('arraySize')) {
    function arraySize($var)
    {
        return (empty($var) || !is_array($var)) ? 0 : count($var);
    }
}
if (!function_exists('safe')) {
    function safe(&$var, $default = null)
    {
        return !empty($var) ? $var : $default;
    }
}
if (!function_exists('exists')) {
    function exists($prefix, $var, $suffix)
    {
        return !empty($var) ? $prefix . $var . $suffix : null;
    }
}
if (!function_exists('lower_case')) {
    function lower_case($string)
    {
        return mb_strtolower($string, 'UTF-8');
    }
}
if (!function_exists('tr')) {
    function tr(&$var, $param, $iso, $default = null)
    {
        return !empty($var) ? $var->getTranslation($param, $iso) : $default;
    }
}
if (!function_exists('is_id')) {
    function is_id($val)
    {
        return preg_match('/^[1-9][0-9]{0,9}$/', $val);
    }
}
//endregion
//region HTML
if (!function_exists('newCss')) {
    function newCss($asset)
    {
        return '<link href="' . $asset . '" media="all" rel="stylesheet" type="text/css">';
    }
}
if (!function_exists('newJs')) {
    function newJs($asset)
    {
        return '<script src="' . $asset . '"></script>';
    }
}
if (!function_exists('tooltip')) {
    function tooltip($title, $placement = 'top')
    {
        return 'data-toggle="tooltip" data-placement="' . $placement . '" title="' . $title . '"';
    }
}
if (!function_exists('oldCheck')) {
    function oldCheck($key, $default = false)
    {
        return (session()->hasOldInput() ? (old($key) ? true : false) : $default) ? 'checked' : null;
    }
}
//endregion
//region JSON
if (!function_exists('json')) {
    function json($array)
    {
        return json_encode($array, JSON_UNESCAPED_UNICODE);
    }
}
if (!function_exists('printJson')) {
    function printJson($var, $array, $scripts = false)
    {
        $result = $var . ' = ' . json($array) . ';';
        if ($scripts === true) $result = '<script>' . $result . '</script>';

        return $result;
    }
}
//endregion
//region Model
if (!function_exists('merge_model')) {
    function merge_model($from, $model, $keys)
    {
        $isos = view()->shared('isos', ['en']);
        if (!empty($model->translatable)) $translatable = $model->translatable;
        else $translatable = [];
        if (empty($keys)) $keys = [];
        foreach ($keys as $key) {
            $thisKey = $from[$key] ?? null;
            if (is_array($thisKey) && in_array($key, $translatable)) {
                foreach ($thisKey as $iso => $value) {
                    if (in_array($iso, $isos)) {
                        $model->setTranslation($key, $iso, $value);
                    }
                }
            } else $model[$key] = $from[$key] ?? null;
        }

        return true;
    }
}
if (!function_exists('upload_image')) {
    function upload_image($key, $path, $sizes, $delete = false, $item = false)
    {
        return FileManager::uploadImage($key, $path, $sizes, $delete, $item);
    }
}
if (!function_exists('upload_original_image')) {
    function upload_original_image($key, $path, $delete = false)
    {
        return FileManager::uploadOriginalImage($key, $path, $delete);

    }
}
if (!function_exists('upload_file')) {
    function upload_file($key, $path, $delete = false)
    {
        return FileManager::uploadFile($key, $path, $delete);
    }
}
//endregion
if (!function_exists('settings')) {
    function settings($key = null, $default = null)
    {
        $settings = app('settings');
        if ($key === null) return $settings;
        if (is_array($key)) return $settings->put($key);

        return $settings->get($key, $default);
    }
}
if (!function_exists('to_url')) {
    function to_url($string)
    {
        return Str::slug($string);
    }
}
if (!function_exists('file_name')) {
    function file_name($size = 20, $ext = '')
    {
        if ($ext) $ext = '.' . $ext;

        return Str::random($size) . $ext;
    }
}
if (!function_exists('banner')) {
    function banner(&$params, &$banners, $thisKey, $thisCount, $key, $label = null)
    {
        return BannerManager::widget($params, $banners, $thisKey, $thisCount, $key, $label);
    }
}
if (!function_exists('r')) {
    function r($val)
    {
        return PageManager::action($val);
    }
}
if (!function_exists('page')) {
    function page($static)
    {
        return route('page', ['url' => r($static)]);
    }
}
if (!function_exists('is_active')) {
    function is_active($page)
    {
        return PageManager::isActive($page);
    }
}
if (!function_exists('is_email')) {
    function is_email($value)
    {
        return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $value);
    }
}
if (!function_exists('is_phone')) {
    function is_phone($value)
    {
        return preg_match('/^\+?[0-9-]+$/', $value);
    }
}
if (!function_exists('remove_qs')) {
    function remove_qs($string)
    {
        return strtok($string, '?');
    }
}
if (!function_exists('get_min')) {
    function get_min(...$params)
    {
        $min = false;
        foreach ($params as $param) {
            $thisParam = (int)$param;
            if ($min === false || $thisParam < $min) $min = $thisParam;
        }

        return $min;
    }
}
if (!function_exists('get_max')) {
    function get_max(...$params)
    {
        $max = 0;
        foreach ($params as $param) {
            $thisParam = (int)$param;
            if ($thisParam > $max) $max = $thisParam;
        }

        return $max;
    }
}
if (!function_exists('get_page')) {
    function get_page($static)
    {
        return PageManager::getPage($static);
    }
}
if (!function_exists('set_locale')) {
    function set_locale()
    {
        return LanguageManager::setLocaleWithoutPrefix();
    }
}
if (!function_exists('post_request')) {
    function post_request($url, $data)
    {
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $result = file_get_contents($url, false, stream_context_create($options));

        return $result;
    }
}
if (!function_exists('_cutStringByWords')) {
    function _cutStringByWords($string, $width)
    {
        $string = trim($string);
        for ($i = $width; $i < strlen($string); $i--) {
            if ($i == 0) return null;
            if (substr($string, $i, 1) == ' ') {
                $string = substr($string, 0, $i);

                return $string . ' ...';
            }
        }

        return $string;
    }
}
if (!function_exists('get_geolocation')) {
    function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "")
    {
        $url = "https://api.ipgeolocation.io/ipgeo?apiKey=" . $apiKey . "&ip=" . $ip . "&lang=" . $lang . "&fields=" . $fields . "&excludes=" . $excludes;
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));

        return curl_exec($cURL);
    }
}


if (!function_exists('authUser')) {
    /**
     * @param null $guard
     * @return User|null
     */
    function authUser($guard = null)
    {
        return UserRegistry::get($guard);
    }
}

if (!function_exists('formatPrice')) {
    function formatPrice($price)
    {
        //return number_format($price, 2, '.', ' ');
        return number_format($price);
    }
}
if (!function_exists('checkPermission')) {
    function checkPermission($permissions){
        foreach ($permissions as $key => $value) {
            $role = array_search($value, \App\Constants\UserRole::keys(), true);
            if (count($permissions) > 1) {
                if (auth()->user()->role == $role) {
                    return true;
                }
            } else {
                if (auth()->user()->role <= $role) {
                    return true;
                }
            }
        }
        return false;
    }
}
