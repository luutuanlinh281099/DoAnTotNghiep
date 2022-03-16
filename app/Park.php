<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    protected $guarded = [];
    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'park_id');
    }
}
