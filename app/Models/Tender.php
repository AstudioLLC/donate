<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends AbstractModel
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
        'content',
        'page_id',
        'active',
        'ordering',
    ];

    /**
     * @var string[]
     */
    public $translatable = [
        'title',
        'content',
    ];
}
