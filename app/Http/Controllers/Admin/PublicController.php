<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Validation\ValidatesRequests; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    use ValidatesRequests; // 启用验证方法

    // 登录页面的展示
    public function login() {
        // 展示视图
        return view('admin.public.login');
    }

    // 验证数据
    public function check() {
        // 开始自动验证
        $this -> validate(request(), [
            'username'      => 'required|min:2|max:20',
            'password'      => 'required|min:6',
            'captcha'       => 'required'
        ]);
        // 身份校验
        $data = request() -> only(['username', 'password']);
        // 默认为启用
        $data['status'] = '2';
        $result = Auth::guard('admin') -> attempt($data, request() -> get('online'));
        if($result) {
            // 成功，跳转到后台管理页面
            return redirect('/admin/index/index');
        } else {
            // 失败，跳转到登录页面
            return redirect('/admin/public/login') -> withErrors([
                'loginError'    => '用户名或密码错误。'
            ]);
        }
    }
}
