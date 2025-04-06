<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Role;

class RoleController extends Controller
{
    // 列表
    public function index() {
        $data = Role::get();
        return view('admin.role.index', compact('data'));
    }
}
