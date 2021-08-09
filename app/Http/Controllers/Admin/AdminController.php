<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Dashboard Admin',
            'url' => 'admin'
        ];
        return view('admin/index', ['data' => $data]);
    }

    public function login(Request $request) {
        $data = [
            'title' => 'Login Admin',
            'url' => 'admin/login'
        ];
        return view('admin/login_admin', ['data' => $data]);
    }

}
