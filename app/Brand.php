<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];
    public function Transaction()
    {
        return $this->hasMany(Transaction::class, 'brand_id');
    }
}
