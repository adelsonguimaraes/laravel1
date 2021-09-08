<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index (Request $request) {
        $nome = "Adelson";
        $idade = 100;
        $cidade = $request->input('cidade');

        $lista = [
            'farinha',
            'ovo',
            'farinha 2',
            'ovo 2'
        ];

        $data = [
            "nome" => $nome,
            "idade" => $idade,
            "cidade"=> $cidade,
            "lista" => $lista
        ];
        
        return view('admin.config', $data);
    }

    public function info () {
        echo 'Configurações INFO 3';
    }

    public function permissoes () {
        echo 'Configurações PERMISSÕES 3';
    }
}
