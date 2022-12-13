<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItensController extends Controller
{
    function index(){
        $itens = DB::table('itens')
        ->select()
        ->get();

        return view('itens.index', [
            'itens' => $itens
        ]);
    }

    function create(){
        return view('itens.create');
    }

    // function inserir(){
    //     $db = null;
    //     try {
    //         $db = DB::getInstance();
    //         $db->query("START TRANSACTION;");

    //         $consulta = $db->prepare("INSERT INTO itens (nomedoitem, prazofinal) VALUES (:nomedoitem, :prazofinal)");
            
    //         $consulta->execute([':nomedoitem' => $this->nomedoitem, ':prazofinal' => $this->prazofinal]);
    //         $consulta = $db->prepare("SELECT id FROM itens ORDER BY id DESC LIMIT 1");
    //         $consulta->execute();
    //         $data = $consulta->fetch(UsuariosController::auth);
    //         $this->id = $data['id'];

    //         foreach($this->listas as $idLista) {
    //             $consulta = $db->prepare("INSERT INTO listas_itens (id_lista, id_item) values (:idLista, :idItem);");
    //             $consulta->execute([
    //                 ':idItem' => $this->id,
    //                 ':idIngrediente' => $idIngrediente
    //             ]);
    //         }
    //     }
    //     catch(PDOException $e){
    //         $db->query("ROLLBACK;");
    //         throw new Exception("Ocorreu um erro interno" . $e);
    //     }
    // }

    function store(Request $request){
        $data = request()->except(['_token']);
        //$data = $request->all();


        DB::table('itens')->insert($data);

        return redirect('/listas');
    }

    function edit($id){
        $item = DB::table('itens')->find($id);
        return view('itens.create', ['item' => $item]);

    }

    function update(Request $request){

        $data = $request->all();

        unset($data['_token']);

        $id = array_shift($data);

        DB::table('itens')->where('id', $id)->update($data);

        return redirect('/listas');

    }

    function destroy($id){
        DB::table('itens')->where('id', $id)->delete();

        return redirect ('/listas');
    }
}

