<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/orderDetails/1';

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
            // 'email' => ['string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'national_id' => ['required', 'integer', 'min:0'],
            'job' => ['required', 'string', 'min:5'],
            'floor' => ['required', 'integer', 'min:0'],
            'building' => ['required', 'integer', 'min:0'],
            'street' => ['required', 'string'],
            'area' => ['required', 'string'],
            'city' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['email']=="example@com"){
            $user =  User::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'national_id' => $data['national_id'],
                'job' => $data['job'],
                'floor' => $data['floor'],
                'building' => $data['building'],
                'street' => $data['street'],
                'area' => $data['area'],
                'city' => $data['city']
            ]);
            $this->redirectTo = '/orderDetails/1';
        }
        else{
            $user =  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'national_id' => $data['national_id'],
                'job' => $data['job'],
                'floor' => $data['floor'],
                'building' => $data['building'],
                'street' => $data['street'],
                'area' => $data['area'],
                'city' => $data['city']
            ]);
            $this->redirectTo = '/orderDetails/0';
        }
        $user->assignRole('client');
        return $user;
    }
}
