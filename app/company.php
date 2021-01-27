<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = true;
    protected $table = 'companies';
    protected $fillable = [
        'name', 'address','ceo','mobile','email','username','password'
    ];

    public function vacancy(){
        return $this->belongsTo(Vacancy::class);
    }
}
