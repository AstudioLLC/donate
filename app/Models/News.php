<?php

namespace App\Models;

use App\Models\Traits\Relationships\NewsRelationships;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use App\Traits\UrlUnique;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends AbstractModel
{
    use HasTranslations, Sortable, UrlUnique, SoftDeletes, NewsRelationships;

    /**
     * @var bool
     */
    protected $sortableDesc = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'url',
        'title',
        'imageSmall',
        'imageBig',
        'short',
        'content',
        'page_id',
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
        'short',
        'content',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1,
            'height' => 1,
            'entityPath' => 'news',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/news/';

    /**
     * @var array[]
     */
    public static $imageSmallSizes = [
        [
            'width' => 416,
            'height' => 368,
            'entityPath' => 'news',
            'size' => 'thumbnail',
        ]
    ];

    /**
     * @var array[]
     */
    public static $imageBigSizes = [
        [
            'width' => 1312,
            'height' => 600,
            'entityPath' => 'news',
            'size' => 'thumbnail',
        ]
    ];
}
