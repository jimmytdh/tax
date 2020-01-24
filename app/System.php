<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $connection = 'tdh';
    protected $table = 'systems';
}
