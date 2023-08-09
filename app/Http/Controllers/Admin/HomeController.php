<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HomeController
{
    public function index()
    {
        return view('home');
    }
}
