<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;

class Country extends AbstractModel
{
    use HasTranslations, Sortable;

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
        'image',
        'ordering',
        'created_at',
        'updated_at',
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'title',
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 21,
            'height' => 16,
            'entityPath' => 'countries',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/countries/';
}
