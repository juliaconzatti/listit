<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    function storeItem(Request $request){
        $lista = DB::table('listas')->select('id')->where('id', '=', );
        $data = $request->all();
        unset($data['_token']);
        DB::table('listas')->insert($data);
        $item = DB::table('itens')->where('nomedoitem', $data['nomedoitem'])->value('id');
        DB::table('listas_itens')->insert(['id_lista' => $lista->id, 'id_item' => $item]);

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

