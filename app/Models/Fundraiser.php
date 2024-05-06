<?php

namespace App\Models;

use App\Models\Traits\Relationships\FundraiserRelationships;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use App\Traits\UrlUnique;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fundraiser extends AbstractModel
{
    use HasTranslations, Sortable, UrlUnique, SoftDeletes, FundraiserRelationships;

    /**
     * @var bool
     */
    protected $sortableDesc = false;

    /**
     * @var string[]
     */
    protected $dates = [
        'start_date',
        'end_date',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'url',
        'child_id',
        'cost',
        'collected',
        'unlimit',
        'title',
        'imageSmall',
        'imageBig',
        'short',
        'content',
        'active',
        'private',
        'campaign',
        'ordering',
        'start_date',
        'end_date',
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
            'entityPath' => 'fundraisers',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/fundraisers/';

    /**
     * @var array[]
     */
    public static $imageSmallSizes = [
        [
            'width' => 416,
            'height' => 217,
            'entityPath' => 'fundraisers',
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
            'entityPath' => 'fundraisers',
            'size' => 'thumbnail',
        ]
    ];

    public function getCollectedPercent()
    {
        if ($this-> cost == 0) {
            return number_format(0, 2, '.', ' ');
        } else {
            return number_format($this->collected * 100 / $this->cost, 2, '.', ' ');
        }
    }
}
