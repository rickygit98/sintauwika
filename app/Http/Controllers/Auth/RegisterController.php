<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
    $contact = str_replace('+','',$data['contact']);
    $user = User::create([
        'name' => $data['name'],
        'role_id' => $data['role_id'],
        'username' => $data['username'],
        'contact' => $contact,
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    $insertedId = $user->id;
    $getrole = $user->role_id;
    if($getrole == 1){
        $admin = new Admin();
        $admin->user_id = $insertedId;
        $admin->id_num = $data['id_num'];
        $admin->save();
        return $user;
    }
    else if($getrole == 2){
        $dosen = new Dosen();
        $dosen->user_id = $insertedId;
        $dosen->nip = $data['nip'];
        $dosen->save();
        return $user;
    }
    else if($getrole == 3){
        $mahasiswa = new Mahasiswa();
        $mahasiswa->user_id = $insertedId;
        $mahasiswa->nrp = $data['nrp'];
        $mahasiswa->save();
        return $user;
    }
    }
}
