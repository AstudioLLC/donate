<?php

namespace App\Models\Traits\Relationships;

use App\Models\Faq;
use App\Models\File;
use App\Models\Gallery;

trait NeedRelationships
{
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('ordering', 'asc');
    }
}
