<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];
    protected $table = 'posts';
    protected $fillable = [
        'title', 'address','company','qualification','need','gender','age_limit','closing_date'
    ];
    public $timestamps = true;


    public function vacancy_quali()
    {
        return $this->belongsTo('App\Vacancy_quali','vacancy_id');
    }
}
