<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $guarded = [];

    public function score()
    {   
        return $this->hasOne(Score::class, 'assignment_id');
    }
}
