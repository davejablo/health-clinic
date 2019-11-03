<?php

namespace App\Http\Controllers\Auth;

use App\DoctorProfile;
use App\Http\Controllers\Controller;
use App\PatientProfile;
use App\Role;
use App\User;
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
            'name' => ['required', 'string','min:2', 'max:100'],
            'surname' => ['required', 'string', 'min:2', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'min:11'],
            'locality' => ['required', 'string', 'min:2', 'max:200'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'numeric'],
            'birthDate' => ['required']
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        switch ($data['role_id']){
            case 'ROLE_PATIENT':
                $patientRole = Role::where('name', 'ROLE_PATIENT')->firstOrFail();
                $user->roles()->attach($patientRole->id);
                PatientProfile::create([
                    'user_id' => $user->id,
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'phone' => $data['phone'],
                    'locality' => $data['locality'],
                    'birthDate' => $data['birthDate'],
                    'gender' => $data['gender'],
                ]);
                break;

            case 'ROLE_DOCTOR':
                $doctorRole = Role::where('name', 'ROLE_DOCTOR')->firstOrFail();
                $user->roles()->attach($doctorRole->id);
                DoctorProfile::create([
                    'user_id' => $user->id,
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'phone' => $data['phone'],
                    'locality' => $data['locality'],
                    'birthDate' => $data['birthDate'],
                    'gender' => $data['gender'],
                ]);
            break;

            case 'ROLE_ADMIN':
                $adminRole = Role::where('name', 'ROLE_ADMIN')->firstOrFail();
                $user->roles()->attach($adminRole->id);
                break;
        }

        return $user;
    }
}
