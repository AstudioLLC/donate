<?php

namespace App\Models\Traits\Relationships;

use App\Models\Faq;
use App\Models\File;
use App\Models\Gallery;
use App\Models\Need;
use App\Models\Region;
use App\Models\Report;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

trait ChildrenRelationships
{
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'key')->where('gallery', 'children')->orderBy('id', 'desc');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'key')->where('file', 'children')->orderBy('created_at', 'desc');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'key')->where('file', 'children')->orderBy('created_at', 'desc');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'key')->where('video', 'children')->orderBy('created_at', 'desc');
    }

    public function region()
    {
        return $this->HasOne(Region::class, 'id', 'region_id');
    }

    public function sponsor()
    {
        return $this->HasOne(User::class, 'id', 'sponsor_id')->with('options');
    }

    public function needs()
    {
        return $this->belongsToMany(Need::class, 'children_needs_relations', 'children_id', 'needs_id');
    }

    public function getChildrenNeedsIdsAttribute()
    {
        return $this->needs->pluck('id')->toArray();
    }

    public function updateNeeds($needs = null, $id = null)
    {
        if ($needs) {
            if ($id) {
                DB::table('children_needs_relations')->where('children_id', $id)->delete();
            }
            foreach ($needs as $need) {
                $insert = [
                    'children_id' => $id,
                    'needs_id' => $need,
                ];
                DB::table('children_needs_relations')->insert($insert);
            }
        }
    }
}
