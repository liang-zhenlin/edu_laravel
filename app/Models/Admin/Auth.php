<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    // 定义关联的数据表
    protected $table = 'auth';

    public $timestamps = false;
    
}
