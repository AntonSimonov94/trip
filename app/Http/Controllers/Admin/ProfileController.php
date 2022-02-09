<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProfileController extends Controller
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('POST')) {
            $this->validate($request, $this->validator(), [], $this->attributes());
            $errors = [];
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);
                $user->save();
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            if($errors !== []) {return redirect()->route('admin.updateProfile')->withErrors($errors);
            }
                else return view('account.index', ['user' => $user]);
        }
        return view('admin.profile', ['user' => $user]);
    }


    protected function validator()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8','confirmed'],
            'newPassword' => ['required', 'string', 'min:8','confirmed']
        ];
    }

    protected function attributes()
    {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}
