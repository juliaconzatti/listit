<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ListasController extends Controller
{
    function index(){
        $listas = DB::table('listas')
        ->select()
        ->get();

        return view('listas.index', [
            'listas' => $listas
        ]);
    }

    function create(){
        return view('listas.create');
    }


    function store(Request $request){
        $data = request()->except(['_token']);
        //$data = $request->all();


        DB::table('listas')->insert($data);

        return redirect('/listas');
    }

    function listar(){

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

    function storelistagem(Request $request, $id){
        $uid = DB::table('usuarios')->select('id')->where('username', '=', $request->session()->get("usuario"))->first();
        $list = DB::table('usuarios_clubes')->select('id_clube')->get();

        foreach($list as $li){
            if($li->id_lista == $uid->id && $li->id_lista == $id){
                return redirect()->back()->with('erro', 'teste');
                break;
            }
        }

        }


//ALTERAR ISSO PARA CRIAR NOVA PAGINA DEPENDENDO DO ID
    public function showindividual(Request $request){
        $lista = Listas::where('id',$rq->id)->get();
    }
}


