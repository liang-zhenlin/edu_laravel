<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    // 登录页面的展示
    public function login() {
        // 展示视图
        return view('admin.public.login');
    }
}
