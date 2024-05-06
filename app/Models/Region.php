<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends AbstractModel
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
        'title',
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
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1,
            'height' => 1,
            'entityPath' => 'regions',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/regions/';
}
