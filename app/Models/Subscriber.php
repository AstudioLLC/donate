<?php

namespace App\Models;

class Subscriber extends AbstractModel
{
    /**
     * @var bool
     */
    protected $sortableDesc = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'email',
        'active',
        'created_at',
        'updated_at'
    ];
}
