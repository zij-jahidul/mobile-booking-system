<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::CUSTOMERHOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        // print_r($user);
        // die;
        if(!User::where('email', $user->getEmail())->exists()){
            User::insert([
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'password' => Hash::make('abc@123'),
                'created_at' => Carbon::now(),
            ]);
        }

      if(Auth::attempt(['email' => $user->getEmail(), 'password' => 'abc@123',])) {
          return redirect('/');
      }

        // $user->token;
    }



    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();
        // print_r($user);
        // die;
        if(!User::where('email', $user->getEmail())->exists()){
            User::insert([
                'name' => $user->name,
                'email' => $user->getEmail(),
                'password' => Hash::make('abc@123'),
                'created_at' => Carbon::now(),
            ]);
        }

      if(Auth::attempt(['email' => $user->getEmail(), 'password' => 'abc@123',])) {
          return redirect('/');
      }

        // $user->token;
    }

}
