<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeBlock extends AbstractModel
{
    use HasTranslations, Sortable, SoftDeletes;

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
        'children',
        'year',
        'donor',
        'labopratories',
        'community',
        'beggars',
        'count',
        'active',
        'ordering',
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
        'children',
        'year',
        'donor',
        'labopratories',
        'community',
        'beggars'
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1,
            'height' => 1,
            'entityPath' => 'homeBlocks',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/homeBlocks/';

    /**
     * @var array[]
     */
    public static $imageFirstSmallSizes = [
        [
            'width' => 375,
            'height' => 493,
            'entityPath' => 'homeBlocks',
            'size' => 'thumbnail',
        ]
    ];

    /**
     * @var array[]
     */
    public static $imageFirstBigSizes = [
        [
            'width' => 1920,
            'height' => 955,
            'entityPath' => 'homeBlocks',
            'size' => 'thumbnail',
        ]
    ];

    /**
     * @var array[]
     */
    public static $imageSecondSmallSizes = [
        [
            'width' => 375,
            'height' => 385,
            'entityPath' => 'homeBlocks',
            'size' => 'thumbnail',
        ]
    ];

    /**
     * @var array[]
     */
    public static $imageSecondBigSizes = [
        [
            'width' => 1920,
            'height' => 622,
            'entityPath' => 'homeBlocks',
            'size' => 'thumbnail',
        ]
    ];

    public static $keys = [
        'children',
        'year',
        'donor',
        'labopratories',
        'community',
        'beggars',
    ];
}
