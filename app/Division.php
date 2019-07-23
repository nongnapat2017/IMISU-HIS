<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function patients() {
        return $this->hasMany(Patient::class);
    }
}
