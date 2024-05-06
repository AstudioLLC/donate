<?php

namespace App\Models\Traits\Relationships;

use App\Models\Binding;
use App\Models\Children;
use App\Models\Country;
use App\Models\Fundraiser;
use App\Models\Gift;
use App\Models\Region;
use App\Models\User;

trait DonationRelationships
{
    public function children()
    {
        return $this->hasOne(Children::class, 'id', 'children_id')->orderBy('ordering', 'asc');
    }

    public function sponsor()
    {
        return $this->HasOne(User::class, 'id', 'sponsor_id')->with('options')->withTrashed();
    }

    public function fundraiser()
    {
        return $this->HasOne(Fundraiser::class, 'id', 'fundraiser_id');
    }

    public function gift()
    {
        return $this->HasOne(Gift::class, 'id', 'gift_id');
    }

    public function country()
    {
        return $this->HasOne(Country::class,'id','country_id');
    }

    public function region()
    {
        return $this->HasOne(Region::class,'id','area');
    }

    public function binding()
    {
        return $this->hasOne(Binding::class,'sponsor_id','user_id');
    }
}
