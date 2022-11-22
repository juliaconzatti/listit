<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ListagemController extends Controller
{


    function index(){

        $listagem = DB::table("lista_itens")->leftJoin("usuarios_lista_itens", function($join){
            $join->on("usuarios_lista_itens.id_listas", "=", "listas.id");
        })
        ->select("listas.id", "listas.nomedalista")
        ->where('id_usuario', '=', Auth::user()->id)
        ->get();

        // $ebtn = DB::table('usuarios_clubes');
        // //var_dump($login);
        // if ($ebtn->id_clube == 1) {
        //     return view('/cluberomance');
        // } else {
        //     return view('login');
        // }

        return view('/listas', [
            'listagem' => $listagem
        ]);
    }

    function store(Request $request, $id){
        $uid = DB::table('usuarios')->select('id')->where('email', '=', $request->session()->get("usuario"))->first();
        $cadastros = DB::table('usuarios_lista_itens')->select('id_listas')->get();

        foreach($cadastros as $c){
            if($c->id_lista == $uid->id && $c->id_lista == $id){
                return redirect()->back()->with('erro', 'teste');
                break;
            }
        }
        // DB::statement("select id_clube from usuarios_clubes");
        // switch($id){
        //     case 1: return redirect('/cluberomance'); break;

        //     case 2: return redirect('/clubefantasia'); break;

        //     case 3: return redirect('/clubechicklit'); break;

        //     case 4: return redirect('/clubeterror'); break;

        //     case 5: return redirect('/clubemisterio'); break;

        //     case 6: return redirect('/clubeficcao'); break;
        }


    }

