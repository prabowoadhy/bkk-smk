<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request) {
        $data = [
            'title' => 'Dashboard Admin',
            'url' => 'admin'
        ];
        return view('admin/index', ['data' => $data]);
    }

    

}
