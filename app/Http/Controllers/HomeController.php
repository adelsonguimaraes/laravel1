<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class HomeController extends Controller
{
    public function __invoke() {
        return view('welcome');
    }
}
