<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function edit($id)
    {
        return view('admin.roles.edit');
    }
}