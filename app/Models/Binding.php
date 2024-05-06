<?php

namespace App\Models;

use App\Constants\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binding extends Model
{
    use HasFactory;


    protected $table = 'bindings';

    protected $dates = [
        'created_at',
    ];

    public function sponsor()
    {
        return $this->HasOne(User::class, 'id', 'user_id')->with('options')->withTrashed();
    }

//    public function option()
//    {
//        return $this->HasOne(UserOptions::class, 'sponsor_id', 'sponsor_id');
//    }
    public function child()
    {
        return $this->hasOne(Children::class,'id','children_id')->withTrashed();
    }
}
