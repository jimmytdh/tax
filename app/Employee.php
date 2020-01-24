<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'land_bank_acct',
        'phlhealth_pen',
        'pag_ibig_mid',
        'gsis_bp_number',
        'bir_tin_number',
        'birth_date',
        'lname',
        'fname',
        'mname',
        'suffix',
        'division'
    ];
}
