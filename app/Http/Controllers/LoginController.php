<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class LoginController extends Controller
{
    //
    public function show(){
        
        return view('main.auth.login');}
    
        public function authenticate(Request $request): RedirectResponse
        {
            $credentials = $request->validate([
                'email' => ['required'],
                'password' => ['required'],
            ]);
     
            if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended(route('main.home'));
            }
     
            return back()->withErrors([
                'username' => 'Thông tin đăng nhập không chính xác.',
            ])->onlyInput('password');
        }
    
    }

