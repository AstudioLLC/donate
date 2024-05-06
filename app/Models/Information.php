<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;

class Information extends AbstractModel
{
    use Sortable, HasTranslations;

    /**
     * @var string
     */
    protected $table = 'information';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'address',
        'phone',
        'map',
        'active',
        'ordering',
        'created_at',
        'updated_at'
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'address'
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1,
            'height' => 1,
            'entityPath' => 'information',
            'size' => 'thumbnail',
        ],
    ];

    /**
     * @var string
     */
    public static $imagePath = '/information/';
}
