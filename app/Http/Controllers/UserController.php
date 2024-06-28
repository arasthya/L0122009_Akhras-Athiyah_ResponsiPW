<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function register(Request $request) {
        Log::info('Register method called');
        $validateData = $request->validate([
            'name' => 'required|max:250',
            'username' => 'required|string|min:5|max:32|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);

        Log::info('User created successfully');
        return redirect('/login')->with('success', 'Registration successful');
    }

    public function authentication(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/anime');
        }
        return back()->with('failed', 'Invalid Credentials');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
