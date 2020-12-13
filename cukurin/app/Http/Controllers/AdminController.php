<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        if (request()->user()->hasRole('admin')) {
            return view('admin.index');
        } else {
            return redirect('/');
        }
    }

    public function editProfile()
    {
        return view('admin.editProfile', [
            'user' => Auth::user()
        ]);
    }

    public function updateProfile(Request $request)
    {
        $this->_userValidation($request);
        $user = Auth::user();
        $attr = $request->all();
        $user->update($attr);
        return back();
    }

    public function showUsersManagement(User $user)
    {
        return view('admin.usersManagement', [
            'users' => User::where('id', '!=', Auth::user()->id)->get(),
            'roles' => Role::all(),
        ]);
    }

    public function editUsersManagement(User $user)
    {
        return view('admin.editUsers', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function updateUsersManagement(Request $request, $id)
    {
        $this->_userValidation($request);
        User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'tentang'=> $request->tentang,
            'status' => $request->status,
            // 'id_role' => $request->role,
        ]);

        return redirect()->route('show.users-management')->with('success', 'Data Berhasil Disimpan.');
    }

    public function destroyUsersManagement($id)
    {
        User::destroy($id);
        return redirect()->back();
    }

    public function storeDataBarber(Request $request)
    {
        request()->validate(
            [
                'username' => ['required', 'alpha_num', 'max:30'],
                'noHp' => ['required', 'string', 'max:13', 'min:10'],
                'alamat' => ['required'],
                'name' => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
                'password' => ['required', 'string', 'min:8','max:10', 'confirmed'],
                'tentang' => ['required'],
                'role' => ['required']
            ],
            [
                'name.string' => 'Nama Lengkap Harus berupa huruf',
                'name.required' => 'Data tidak boleh kosong, harap diisi',
                'username.required' => 'Data tidak boleh kosong, harap diisi',
                'noHp.required' => 'Data tidak boleh kosong, harap diisi',
                'alamat.required' => 'Data tidak boleh kosong, harap diisi',
                'email.required' => 'Data tidak boleh kosong, harap diisi',
                'password.required' => 'Data tidak boleh kosong, harap diisi',
                'password.min' => 'Minimal 8 karakter',
                'password.max' => 'Minimal 10 karakter',
                'password.confirmed' => 'Masukkan konfirmasi password yang valid',
                'email.email' => 'Masukkan Email yang valid.',
                'email.unique' => 'Email sudah digunakan, silakan ganti.',
                'username.max' => 'Maksimal 30 karakter',
                'username.alpha_num' => 'Hanya bisa diisi dengan karakter alpha numeric',
                'tentang.required' => 'Data tidak boleh kosong, harap diisi',
                'role.required' => 'Data tidak boleh kosong, harap diisi',
            ]
        );
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'noHp' => $request->input('noHp'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'tentang'=> $request->input('tentang'),
            'id_role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);
        // return $user;
        $user->status()->attach(User::where('name', 'BelumTerverifikasi')->first());

        return redirect()->route('show.users-management')->with('success', 'Data Berhasil Ditambahkan.');
    }

    public function editPassword()
    {
        return view('admin.editPassword');
    }

    public function updatePassword()
    {
        request()->validate(
            [
                'old_password' => 'required',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'old_password.required' => 'Data tidak boleh kosong, harap diisi',
                'password.required' => 'Data tidak boleh kosong, harap diisi',
                'password.min' => 'Minimal 8 Karakter',
                'password.confirmed' => 'Masukkan konfirmasi password yang valid',
            ]
        );

        $currentPassword = auth()->user()->password;
        $oldPassword = request('old_password');

        if (Hash::check($oldPassword, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
            return back()->with('success', 'Ganti password berhasil.');
        } else {
            return back()->withErrors(['old_password' => 'Masukkan password anda yang sekarang.']);
        }
    }

    private function _userValidation(Request $request)
    {
        $validation = $request->validate([
            'username' => ['required', 'alpha_num', 'max:30'],
            'noHp' => ['required', 'string', 'max:13', 'min:10'],
            'alamat' => ['required'],
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:30'],
        ]);
    }
}
