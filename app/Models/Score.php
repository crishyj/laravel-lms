<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $guarded = [];

    
    public function assignment()
    {   
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }
}
