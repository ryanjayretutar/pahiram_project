<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = '/';

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email_address' => ['required','min:10','email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:15', 'confirmed'],
            'cellphone_number' => ['required','digits:11']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'user_level' => 1,
            'username' => $data["email"],
            'email_address' => $data["email"],
            'password' => Hash::make($data["password"])
        ]);
        $user->user_details()->create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'suffix' => $data['suffix'],
            'email_address' => $data['email'],
            'cellphone_number' => $data['cellphone_number'],
            'status' => '1'
        ]);
        $user->user_level()->create();
        // return redirect()->route('register.post')->with('success','Item created successfully!');
        return $user;

    }
    public function register(Request $request)
   {
       $this->validator($request->all());

       event(new Registered($user = $this->create($request->all())));

       $this->guard()->login($user);

       return $this->registered($request, $user)
           ?: redirect($this->redirectPath());
   }
}
