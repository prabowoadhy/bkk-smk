<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPrakerinController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Lowongan Prakerin',
            'url' => 'admin/prakerin'
        ];
        return view('admin_prakerin/prakerinview', ['data' => $data]);
    }
}
