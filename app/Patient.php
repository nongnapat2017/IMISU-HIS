<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $dates = ['dob'];

    public function division() {
        return $this->belongsTo(Division::class);
    }

    public function treatments() {
        return $this->hasMany(Treatment::class);
    }
}
