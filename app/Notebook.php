<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    //

    public function notes()
    {
       return $this->hasMany(Note::class);
    }
}

