<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Rules\Postcode;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/address';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator()
    {
        return $this->validate(request(), [
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:8|string',
            'postcode' => 'required',
            'postcode' => [
                'required',
                'string',
                new Postcode()
            ]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store()
    {
        $this->validator();

        $user = User::create(request(['name', 'email', 'password' , 'postcode']));

        $this->sendEmail($user);

        return redirect()->to('/address');

    }

    protected function sendEmail($user){
        if($user){
            Mail::to($user->email)->send(new \App\Mail\RegisterWelcomeMail($user));
        }
    }
}
