<?php

namespace App\Models;

class Volunteering extends AbstractModel
{
    protected $table = 'volunteering';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'surname',
        'age_group',
        'phone',
        'file',
        'message',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 1,
            'height' => 1,
            'entityPath' => 'volunteering',
            'size' => 'thumbnail',
        ],
    ];

    /**
     * @var string
     */
    public static $imagePath = '/volunteering/';
}
