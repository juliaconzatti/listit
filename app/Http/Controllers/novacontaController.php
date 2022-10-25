<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NovacontaController extends Controller
{
    function index(){
        $novaconta = DB::table('usuarios')
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

        DB::table('usuarios')->insert($data);

        return redirect('novaconta/store'); //ARRUMAR O STORE, NO NAVGADOR APARECE novacontaconta/store E DEVERIA SER novaconta/store
    }
}
