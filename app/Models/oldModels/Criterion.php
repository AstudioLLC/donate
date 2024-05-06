<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Criterionn extends Model
{
    use HasTranslations;

    protected $table = 'criteria';

    public $translatable = [
        'name'
    ];

    protected $fillable = [
        'name'
    ];

    public function filter()
    {
        return $this->belongsTo(Filter::class, 'id', 'filter_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_criterion_references', 'criterion_id', 'item_id');
    }
}
