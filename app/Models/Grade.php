<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $guarded = [];

    public function classess() {
        return $this->hasMany(Classes::class);
    }
}
