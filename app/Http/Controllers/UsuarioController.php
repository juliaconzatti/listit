<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
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

}
