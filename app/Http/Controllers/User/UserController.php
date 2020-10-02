<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }

    public function update(Request $request)
    {

        $user =  auth()->user();

        $data = $request->all();

        if ($request->email) {
            unset($data['email']);
        }

        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $image = $request->file('image');

        if ($request->image) {

            if ($user->image) {
                $nameFile = $user->image;
            } else {
                $nameFile = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();
            }

            $upload = $image->storeAs('profiles', $nameFile);

            if ($upload) {
                $data['image'] = $nameFile;
            } else {
                return redirect()
                    ->back()
                    ->withErrors(['errors' => 'Erro no Upload!'])
                    ->withInput();
            }
        }

        $update = $user->update($data);

        if ($update) {
            return redirect()->back()->withSuccess('Atualização realizada com sucesso!');
        } else {
            return redirect()->back()->withErrors('Falha ao Atualizar!');
        }
    }
}
