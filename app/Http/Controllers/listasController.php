<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

}
