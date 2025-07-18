<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
 
class UserController extends Controller
{
    public function users()
    {
        $title = 'Data User';
        $data = User::all();
        
        if(Auth::user()->role =='admin'){
            return view('users.index', compact(['title', 'data']));
        }else {
            echo "Anda tidak memiliki akses";
        }
    }

    public function viewTambah()
    {
        $title = 'Tambah User';
        return view('users.tambah', compact('title'));
    }

    public function postAdd(Request $request)
    {
        Validator([
            'name' => 'required',
            'email' => 'required|unique',
            'role' => 'required',
            'password' => 'required',
        ]);
        $data = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        $data->save();
        return redirect('/users')->with('success', 'data berhasil di tambahkan');
    }

    public function viewEdit($id)
    {
        $title = 'Edit User';
        $user = User::where('id', $id)->first();
        return view('users.edit', compact('title', 'user'));
    }

    public function postEdit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'       => 'required|exists:users,id',
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'role'     => 'required|string',
            'password' => 'nullable|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ];

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $request->id)->update($data);

        return redirect('/users')->with('success', 'data berhasil di update');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        return redirect('/users')->with('success', 'data berhasil di hapus');
    }
}
