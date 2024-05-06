<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;

class Gift extends AbstractModel
{
    use Sortable, HasTranslations;

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
        'cost',
        'active',
        'ordering',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'created_at',
        'updated_at'
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
            'entityPath' => 'gifts',
            'size' => 'thumbnail',
        ],
    ];

    /**
     * @var string
     */
    public static $imagePath = '/gifts/';

    /**
     * @var array[]
     */
    public static $imageSmallSizes = [
        [
            'width' => 416,
            'height' => 217,
            'entityPath' => 'gifts',
            'size' => 'thumbnail',
        ]
    ];

    /**
     * @var array[]
     */
    public static $imageBigSizes = [
        [
            'width' => 1920,
            'height' => 707,
            'entityPath' => 'gifts',
            'size' => 'thumbnail',
        ]
    ];
}
