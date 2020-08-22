<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded = [];

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }
}
