<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }
    /**
     * Destroy an authenticated session.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))){
    $request->session()->regenerate();
    return redirect('/stores');
}

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        
    }

    /**
     * Destroy an authenticated session.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illumination\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout(); //ユーザーをログアウトする
        $request->session()->invalidate(); //セッションを無効にする
        $request->session()->regenerateToken(); //新しいCSRFトークンを生成する

        return redirect('/stores'); //ログアウト後に'/stores'ページにリダイレクトする
    }
}
