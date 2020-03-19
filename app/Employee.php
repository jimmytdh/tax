<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'birth_date',
        'lname',
        'fname',
        'mname',
        'suffix',
        'division',
        'designation',
        'hired_date'
    ];
}
