<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'surname', 'firstname',
        'address', 'postal_code', 'city',
        'mail', 'phone',
        'group',
        'formation', 'entry_year', 'obtaining_year',
        'enterprise_info', 'notepad'
    ];

    public function getCityAttribute($value){
        return strtoupper($value);
    }

    public function getSurnameAttribute($value){
        return strtoupper($value);
    }

    public function getFirstnameAttribute($value){
        return ucfirst($value);
    }
}
