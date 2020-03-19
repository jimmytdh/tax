<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryGradeTable extends Model
{
    protected $table = 'salary_grade_tables';
    protected $fillable = ['code','year','salary'];
}
