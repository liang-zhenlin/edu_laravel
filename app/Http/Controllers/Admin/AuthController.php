<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 权限管理

    // 列表
    public function index() {
        return view('admin.auth.index');
    }

    // 添加
    public function add() {
        return view('admin.auth.add');
    }
}
