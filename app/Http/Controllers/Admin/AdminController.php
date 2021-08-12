<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        if (Auth::check()) {
            return redirect('admin');
        } else {
            return redirect('admin-login');
        }
    }

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
