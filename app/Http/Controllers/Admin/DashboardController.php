<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorize('Visualizar Página Dashboard');

        return view('admin.dashboard.index');
    }
}
