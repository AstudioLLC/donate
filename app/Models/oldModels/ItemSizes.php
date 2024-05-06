<?php

namespace App\Models;

class ItemSizess extends AbstractModel
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'price'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
