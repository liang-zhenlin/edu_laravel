<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Models\Admin\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // 权限管理

    // 列表
    public function index() {
        $data = DB::table('auth as t1') -> select('t1.*', 't2.auth_name as parent_name') -> leftJoin('auth as t2', 't1.pid', '=', 't2.id') -> get();
        return view('admin.auth.index', compact('data'));
    }

    // 添加
    public function add() {
        if (Request::method() == 'POST') {
            $data = Request::except('_token');
            $result = Auth::insert($data);
            return $result ? '1' : '0';
        } else {
            $parents = Auth::where('pid', '=', '0') -> get();
            return view('admin.auth.add', compact('parents'));
        }
        
    }
}
