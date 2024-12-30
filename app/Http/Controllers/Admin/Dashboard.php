<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    function index() {
        $data['father'] = 'Umer Shahzad';
        $data['son'] = 'Essa';
        return view('admin.dashboard.index', $data);
    }
}
