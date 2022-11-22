<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}

