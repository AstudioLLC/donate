<?php

namespace App\Models;

use App\Models\Traits\Relationships\FaqRelationships;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends AbstractModel
{
    use HasTranslations, Sortable, SoftDeletes, FaqRelationships;

    /**
     * @var bool
     */
    protected $sortableDesc = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'page_id',
        'title',
        'image',
        'content',
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
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1312,
            'height' => 600,
            'entityPath' => 'faqs',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/faqs/';
}
