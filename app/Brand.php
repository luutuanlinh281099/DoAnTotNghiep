<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];
    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'brand_id');
    }
    public function member()
    {
        return $this->hasMany(Member::class, 'brand_id');
    }
}
