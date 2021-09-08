@extends('layouts.admin')

@section('title', 'Adição de Tarefas')

@section('content')
    <h1>Adição</h1>

    <form method="POST">
        @csrf

        <label for="">
            Título: <br/>
            <input type="text" name="titulo"/>
        </label>

        <input type="submit" value="Adicionar" />
    </form>

@endsection