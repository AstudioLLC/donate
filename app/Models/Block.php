<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;
use App\Traits\UrlUnique;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends AbstractModel
{
    use HasTranslations, Sortable, UrlUnique, SoftDeletes;

    /**
     * @var bool
     */
    protected $sortableDesc = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'title',
        'small_title',
        'content',
        'count',
        'icon',
        'image',
        'active',
        'ordering',
        'url',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'small_title',
        'content',
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 640,
            'height' => 657,
            'entityPath' => 'blocks',
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
            'entityPath' => 'blocks',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/blocks/';
}
