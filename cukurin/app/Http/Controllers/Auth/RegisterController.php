<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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
        return Validator::make(
            $data,
            [
                'username' => ['required', 'alpha_num', 'max:30'],
                'noHp' => ['required','numeric','max:13', 'min:10'],
                'alamat' => ['required'],
                'tentang' => ['required'],
                'name' => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
                'password' => ['required', 'string', 'min:8','max:10', 'confirmed'],
                'role' => ['required']
            ],
            [
                'name.string' => 'Nama Lengkap Harus berupa huruf',
                'name.required' => 'Data tidak boleh kosong, harap diisi',
                'name.max' => 'Maksimal 30 karakter',
                'username.required' => 'Data tidak boleh kosong, harap diisi',
                'username.max' => 'Maksimal 30 karakter',
                'username.alpha_num' => 'Hanya bisa diisi dengan karakter huruf dan angka',
                'noHp.required' => 'Data tidak boleh kosong, harap diisi',
                'noHp.numeric' => 'Data harus berupa angka',
                'noHp.max' => 'Maksimal 13 karakter',
                'noHp.min' => 'Minimal 10 Karakter',
                'alamat.required' => 'Data tidak boleh kosong, harap diisi',
                'tentang.required' => 'Data tidak boleh kosong, harap diisi',
                'email.required' => 'Data tidak boleh kosong, harap diisi',
                'email.unique' => 'Email sudah digunakan, silakan ganti.',
                'email.max' => 'Maksimal 30 karakter',
                'password.required' => 'Data tidak boleh kosong, harap diisi',
                'password.min' => 'Minimal 8 karakter',
                'password.max' => 'Maksimal 10 karakter',
                'password.confirmed' => 'Masukkan konfirmasi password yang valid',
                'email.email' => 'Masukkan Email yang valid.',
                'role.required' => 'Data tidak boleh kosong, harap diisi',
            ]
        );
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
            'username' => $data['username'],
            'noHp' => $data['noHp'],
            'alamat' => $data['alamat'],
            'tentang' => $data['tentang'],
            'email' => $data['email'],
            'id_role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/login';
    }
}
