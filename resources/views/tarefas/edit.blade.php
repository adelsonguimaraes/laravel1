@extends('layouts.admin')

@section('title', 'Edição de Tarefas')

@section('content')
    <h1>Edição</h1>

    @if($errors->any())
        @component('components.alert')
            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        @endcomponent
    @endif

    <form method="POST">
        @csrf

        <label for="">
            Título:<br/>
            <input type="text" name="titulo" value="{{ $data->titulo }}"/>
        </label>

        <input type="submit" value="Salvar">
    </form>

@endsection