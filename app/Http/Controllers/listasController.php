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


    // function store(Request $request){
    //     $data = request()->except(['_token']);
    //     $uid = DB::table('usuarios')->select('id')->where('email', '=', $request->session()->get("usuario"))->first();
    //     $lista =  DB::table('listas')->select('id')->where('id', '=', 'id');
    //     //$data = $request->all();

    //     DB::table('listas')->insert($data);
    //     DB::statement("insert into usuarios_listas (id_usuario, id_lista) values ($uid->id, $lista->id)");

    //     return redirect('/listas');
    // }

    //  function store(Request $request){
    //     $filler = $request->all();
    //     $listas = ListasController::create($filler);
    
    //     $filler['lista_id'] = $listas->id;
    //     Usuarios_listas::create($filler);
    
    //     return redirect()->action('/listas');
    // }

    function store(Request $request){//CONTINUAR AQUI
        $uid = DB::table('usuarios')->select('id')->where('email', '=', $request->session()->get("usuario"))->first();
        $teste = DB::statement("START TRANSACTION;
        INSERT INTO listas(nomedalista)
        VALUES(:nomedalista);
        SELECT LAST_INSERT_ID() INTO @idLista;
        INSERT INTO usuarios_listas(id_lista, id_usuario)
        VALUES('@idLista', $uid);
      COMMIT;");

      return view('listas/create', [
        'teste' => $teste
    ]);
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

    // function listaremindividual(){

    //     $listagemind = DB::table("listas")->leftJoin("usuarios_listas", function($join){
    //         $join->on("usuarios_listas.id_lista", "=", "listas.id");
    //     })
    //     ->select("listas.id", "listas.nomedalista")
    //     ->where('id_usuario', '=', Auth::user()->id)
    //     ->get();


    //     return view('listaindividual/show', [
    //         'listagemind' => $listagemind
    //     ]);
    // }


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

        function show($id){
            $itens = DB::table('listas_itens')
            ->select('*')
            ->leftJoin('itens','id_item','=','itens.id')
            ->leftJoin('listas','id_lista','=','listas.id')
            ->where('listas_itens.id_lista','=',DB::raw($id))
            ->get();

            return view('listaindividual/show', [
                'itens' => $itens
            ]);
        }
    
    }

