<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        // Generate a unique SSO token
        $token = bin2hex(random_bytes(16)); // You can adjust the length as needed

        // Store the SSO token in the database
        DB::update('UPDATE users SET sso_token = ? where id = ? ', [
            $token,auth()->user()->id]);
        // auth()->user()->update(['sso_token' => $token]);

        // dd('authenticated method called'.auth()->user()->id);

        // Set the token as a cookie in the user's browser
        return redirect('/index')->cookie('sso_token', $token, 0, '/', '', false, true);
    }
}
