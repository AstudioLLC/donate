<?php

namespace App\Models;

use App\Models\Traits\Relationships\ChildrenRelationships;
use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Children extends AbstractModel
{
    use HasTranslations, Sortable, SoftDeletes, ChildrenRelationships;

    /**
     * @var bool
     */
    protected $sortableDesc = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'child_id',
        'region_id',
        'sponsor_id',
        'title',
        'image',
        'content',
        'date_of_birth',
        'gender',
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
        'content',
    ];

    /**
     * @var array[]
     */
    public static $imageSizes = [
        [
            'width' => 162,
            'height' => 187,
            'entityPath' => 'childrens',
            'size' => 'thumbnail'
        ]
    ];

    /**
     * @var string
     */
    public static $imagePath = '/childrens/';

    public function getGenderText($role)
    {
        return __('app.Gender.' . $role);
    }

    public function calculateAge()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function unread()
    {
        return $this->hasOne(Chat::class);
    }
}
