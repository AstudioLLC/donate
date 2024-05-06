<?php

namespace App\Models\Traits\Relationships;


use App\Models\Children;
use App\Models\User;

trait ChatRelationships
{
    public function children()
    {
        return $this->HasOne(Children::class, 'id', 'children_id');
    }

    public function sponsor()
    {
        return $this->HasOne(User::class, 'id', 'sponsor_id')->with('options');
    }
}
