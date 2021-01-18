<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    public $timestamps = true;
    protected $guarded=[];
    protected $table = 'vacancies';
    protected $fillable = [
        'title', 'closing_date','company'
    ];
}
