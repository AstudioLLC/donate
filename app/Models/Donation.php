<?php

namespace App\Models;

use App\Models\Traits\Relationships\DonationRelationships;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends AbstractModel
{
    use DonationRelationships, SoftDeletes;

    protected $table = 'donations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'order_id',
        'mdorder',
        'status',
        'fundraiser_id',
        'gift_id',
        'is_binding',
        'seen',
        'user_seen',
        'bindingId',
        'sponsor_id',
        'children_id',
        'amount',
        'cost',
        'count',
        'whom_sp',
        'project_type',
        'area',
        'email',
        'fullname',
        'country_id',
        'city',
        'address',
        'phone',
        'card_type',
        'anonymous',
        'message',
        'message_admin',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDatesAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::createFromFormat('m/d/Y', $value);
    }
}
