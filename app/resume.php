<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    protected $table = 'resumes';
    protected $fillable = [
        'title', 'cv'
    ];
}
