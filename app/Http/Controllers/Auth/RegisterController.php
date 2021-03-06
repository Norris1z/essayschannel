<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Validator;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    public function redirectPath() {

    // Logic that determines where to send the user
        if (\Auth::user()->hasRole('admin')) {
            return '/home';
        } else if (\Auth::user()->hasRole('client')) {
            return '/home';
        }
    }


    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',            
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
     
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            
            $user->password = bcrypt($data['password']);

            $user->save();

            $role = Role::where('name', '=', 'client')->firstOrFail();

            $user->roles()->attach($role);

            return $user;

    }
}