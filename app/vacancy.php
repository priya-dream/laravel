<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = [
        'title', 'closing_date','company','gender','age','need','qualification'
    ];
}
