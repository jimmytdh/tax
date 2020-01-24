<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salary';
    protected $fillable = [
        'emp_id',
        'designation',
        'appointment_date',
        'code',
        'sg',
        'basic_salary',
    ];
}
