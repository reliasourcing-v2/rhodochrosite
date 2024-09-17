<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ReportsController extends Controller
{

    public function index()
    {
        return Inertia::render('Admin/ReportsManagement/Index', []);
    }

}
