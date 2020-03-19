<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = ['code','name','salary_grade'];
}
