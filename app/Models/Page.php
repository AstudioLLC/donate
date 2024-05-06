<?php

namespace App\Models;

use App\Models\Traits\Relationships\PageRelationships;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use App\Traits\UrlUnique;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Page extends AbstractModel
{
    use HasTranslations, Sortable, UrlUnique, SoftDeletes, PageRelationships;

    /**
     * @var bool
     */
    protected $sortableDesc = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'parent_id',
        'url',
        'title',
        'icon',
        'image',
        'show_image',
        'to_top',
        'to_menu',
        'to_footer',
        'content',
        'sec_content',
        'title_content',
        'active',
        'ordering',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'content',
        'sec_content',
        'title_content',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    /**
     * @var array[]
     */
    public static $gallerySizes = [
        [
            'width' => 1350,
            'height' => 760 ,
            'entityPath' => 'gallery',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1920,
            'height' => 707,
            'entityPath' => 'pages',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var array[]
     */
    public static $iconSizes = [
        [
            'width' => 100,
            'height' => 100,
            'entityPath' => 'pages',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/pages/';



    private static function cacheKeyMenu()
    {
        return 'menu';
    }

    private static function cacheKeyStatic()
    {
        return 'pages_static';
    }

    public static function clearCaches()
    {
        Cache::forget(self::cacheKeyMenu());
        Cache::forget(self::cacheKeyStatic());
    }

    public static function getStaticPages()
    {
        return Cache::rememberForever(self::cacheKeyStatic(), function () {
            return self::query()->select('id', 'url', 'static', 'active')->whereNotNull('static')->get();
        });
    }
}
