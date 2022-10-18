<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NovacontaController extends Controller
{
    function index(){
        $novaconta = DB::table('clientes')
        ->select()
        ->get();

        return view('novaconta.index', [
            'novaconta' => $novaconta
        ]);
    }

    function create(){
        return view('novaconta.create');
    }

    function store(Request $request){
        $data = $request->all();
        unset($data['_token']);

        $data["password"] = Hash::make($data["password"]);

        DB::table('clientes')->insert($data);

        return redirect('/novaconta');
    }
}
