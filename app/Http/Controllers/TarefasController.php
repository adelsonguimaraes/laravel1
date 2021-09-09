<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function list () {
        // $list = DB::select('SELECT * FROM tarefas');
        $list = Tarefa::all();

        return view('tarefas.list', ['list' => $list]);
    }

    public function add () {
        return view('tarefas.add');
    }

    public function addAction (Request $r) {
        $r->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        $titulo = $r->input('titulo');

        // DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo'=>$titulo]);
        // DB::table('tarefas')->insert(['titulo'=>$titulo]);
        $t = new Tarefa;
        $t->titulo = $titulo;
        $t->save();

        return redirect()->route('tarefas.list');
    }

    public function edit ($id) {
        // $data = DB::select('SELECT * FROM tarefas WHERE id = :id', ['id'=>$id]);
        $data = Tarefa::find($id);

        // if(count($data)>0) {
        if($data) {
            // return view('tarefas.edit', ['data' => $data[0]]);
            return view('tarefas.edit', ['data' => $data]);
        }else{
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction (Request $r, $id) {
        $r->validate([
            'titulo' => [ 'required', 'string' ]
        ]);
        
        $titulo = $r->input('titulo');

        // DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', ['id'=>$id, 'titulo'=>$titulo]);
        // $t = Tarefa::find($id);
        // $t->titulo = $titulo;
        // $t->save();

        Tarefa::find($id)->update(['titulo'=>$titulo]);
        
        return redirect()->route('tarefas.list');
    }

    public function del ($id) {
        // DB::delete('DELETE FROM tarefas WHERE id = :id', ['id'=> $id]);

        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.list');
    }

    public function done ($id) {
        // DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', ['id'=>$id]);

        $t = Tarefa::find($id);
        if ($t) {
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }
        
        return redirect()->route('tarefas.list');
    }
}
