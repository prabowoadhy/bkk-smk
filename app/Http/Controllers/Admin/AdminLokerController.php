<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLokerController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Lowongan Kerja',
            'url' => 'admin/loker'
        ];
        return view('admin_loker/lokerview', ['data' => $data]);
    }
}
