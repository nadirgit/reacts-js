<?php
// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin');
        }

        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function logout(){
        request()->session()->invalidate();
        Auth::logout();
        return redirect('/admin');
    }
}
