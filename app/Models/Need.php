<?php

namespace App\Models;

use App\Models\Traits\Relationships\NeedRelationships;
use App\Traits\HasTranslations;
use App\Traits\Sortable;

class Need extends AbstractModel
{
    use HasTranslations, Sortable, NeedRelationships;

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
        'title',
        'active',
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
            'width' => 1,
            'height' => 1,
            'entityPath' => 'needs',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/needs/';
}
