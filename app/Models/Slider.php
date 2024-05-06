<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends AbstractModel
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
        'button_title',
        'image',
        'mobile_image',
        'content',
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
        'button_title',
        'content',
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1920,
            'height' => 990,
            'entityPath' => 'sliders',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var array[]
     */
    public static $imageSmallSizes = [
        [
            'width' => 400,
            'height' => 400,
            'entityPath' => 'sliders',
            'size' => 'thumbnail',
        ]
    ];
    /**
     * @var string
     */
    public static $imagePath = '/sliders/';
}
