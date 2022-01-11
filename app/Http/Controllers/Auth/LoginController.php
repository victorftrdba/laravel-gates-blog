<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect()->route('admin.dashboard.index');
        }

        return redirect()->route('auth.login.index')->with(['error' => 'Não foi possível fazer a autenticação']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login.index');
    }
}
