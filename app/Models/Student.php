<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function attand() {
        return $this->hasMany(Attand::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class);
    }
    
}
