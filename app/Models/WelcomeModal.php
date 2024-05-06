<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sortable;

class WelcomeModal extends AbstractModel
{
    use Sortable;
    use HasFactory;

    protected $fillable = [
        'id',
        'url',
        'image',
        'active',
        'created_at',
        'updated_at',
    ];

    public static $imageSizes = [
        [
            'width' => 800,
            'height' => 500,
            'entityPath' => 'WelcomeModals',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/WelcomeModals/';
}
