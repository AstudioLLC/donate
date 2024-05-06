<?php

namespace App\Models\Traits\Relationships;

use App\Models\Page;

trait FaqRelationships
{
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
