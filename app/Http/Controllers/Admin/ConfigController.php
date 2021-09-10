<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConfigController extends Controller
{

    public function __construct () {
        $this->middleware('auth');
    }

    public function index (Request $request) {
        $user = Auth::user(); // ou $request->user();
        $nome = $user->name;
        
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
            "lista" => $lista,
            "showForm" =>  Gate::allows('see-form')
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
