<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;


class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
    	return view('home.login');
    }

    /**
     * @param LoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        if ( Auth::attempt( ['email' => $email, 'password' => $password]))
        {
            return redirect()->intended('/');
        }
        $validator = Validator::make($request->all(), []);
        $validator->errors()->add('message', "E-mail / Mot de passe incorrect !");
        return redirect()
            ->route('login')
            ->withErrors($validator)
            ->withInput($request->all());
    }

    /**
     * @param RegisterRequest $request
     * @return mixed
     */
    public function addUser(RegisterRequest $request)
    {
        $user = new User();
        $user->firstname    = $request->get('firstname');
        $user->lastname     = $request->get('lastname');
        $user->email        = $request->get('email');
        $user->password     = bcrypt($request->get('password'));

        if($user->save())
        {
            return redirect()->back()->withSucces("L'utilisateur est ajouté avec succès :)");
        }
        return redirect()
                ->back()
                ->withInput($request->all())
                ->withError("Erreur lors la creation d'un nouveau utilisateur");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
