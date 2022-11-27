<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'rol_id'   => 'required',
            'status'   => 'required',
        ]);

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/user-management');
    }

    public function update(Request $request)
    {

        if ($request->password == NULL) {
            User::where('id', $request->id_edt)
                ->update([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'rol_id'    => $request->rol_id,
                    'status'    => $request->estatus_edt
                ]);
        } else {
            User::where('id', $request->id_edt)
                ->update([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'rol_id'    => $request->rol_id,
                    'status'    => $request->estatus_edt,
                    'password'  => bcrypt($request->password)
                ]);
        }

        return redirect('/user-management');
    }
}
