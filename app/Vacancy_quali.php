<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy_quali extends Model
{
    protected $table = 'vacancy_qualification';

    public function post()
    {
        return $this->hasMany('App\Post','vacncy_id');
    }
}
