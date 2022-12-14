<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{

    public function login(Request $form)
    {
        if ($form->isMethod('POST')) {
            $credenciais = $form->validate([
                'email' => ['required'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credenciais)) {
                session()->regenerate();
                $form->session()->put('usuario', $credenciais['email']);
                return redirect('listas');
            } else {
                // Login deu errado (usuário ou senha inválidos)
                return redirect()->route('login')->with(
                    'erro',
                    'E-mail ou senha inválidos.'
                );
            }
        }

        return view("login/login");
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
