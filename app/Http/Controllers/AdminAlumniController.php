<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAlumniController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Data Alumni',
            'url' => 'admin/alumni'
        ];
        return view('admin_alumni/alumniview', ['data' => $data]);
    }
}
