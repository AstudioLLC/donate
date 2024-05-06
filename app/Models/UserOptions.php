<?php

namespace App\Models;

class UserOptions extends AbstractModel
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'country_id',
        'sponsor_id',
        'donor_type',
        'date_of_birth',
        'recurring_payment',
        'is_send_email',
        'children_age_beetwen',
        'children_gender',
        'children_region',
        'children_program_approach',
        'want_recive_letters',
    ];

//    public function user()
//    {
//        return $this->HasOne(User::class, 'id', 'user_id')->with('options');
//    }
}
