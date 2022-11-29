<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ListagemController extends Controller
{


    function index(){

        $listagem = DB::table("listas")->leftJoin("usuarios_listas", function($join){
            $join->on("usuarios_listas.id_lista", "=", "listas.id");
        })
        ->select("listas.id", "listas.nomedalista")
        ->where('id_usuario', '=', Auth::user()->id)
        ->get();


        return view('listas/create', [
            'listagem' => $listagem
        ]);
    }

    function store(Request $request, $id){
        $uid = DB::table('usuarios')->select('id')->where('username', '=', $request->session()->get("usuario"))->first();
        $list = DB::table('usuarios_clubes')->select('id_clube')->get();

        foreach($list as $li){
            if($li->id_lista == $uid->id && $li->id_lista == $id){
                return redirect()->back()->with('erro', 'teste');
                break;
            }
        }

        }

    }
