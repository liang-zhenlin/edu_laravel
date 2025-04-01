<?php

namespace App\Models\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //
    protected $table = 'manager';

    use Authenticatable;

}
