<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;
use App\Traits\UrlUnique;

class OurPublication extends AbstractModel
{
    use HasTranslations, Sortable, UrlUnique;

    /**
     * @var string
     */
    public static $imagePath = '/our_publications/';

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
        'imageBig',
        'content',
        'active',
        'ordering',
        'seo_title',
        'seo_description',
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'content',
        'seo_title',
        'seo_description',
    ];

    /**
     * @var array[]
     */
    public static $imageBigSizes = [
        [
            'width' => 1286,
            'height' => 588,
            'entityPath' => 'our_publications',
            'size' => 'thumbnail',
        ]
    ];
    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1286,
            'height' => 588,
            'entityPath' => 'our_publications',
            'size' => 'thumbnail'
        ]
    ];

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'key')->where('gallery', 'our_publications')->orderBy('ordering', 'asc');
    }
    public function files()
    {
        return $this->hasMany(File::class, 'key')->where('file', 'our_publications')->orderBy('ordering', 'asc');
    }
}
