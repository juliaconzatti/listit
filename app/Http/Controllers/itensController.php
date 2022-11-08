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

    function store(Request $request){
        $data = request()->except(['_token']);
        //$data = $request->all();


        DB::table('itens')->insert($data);

        return redirect('/listas');
    }
}

