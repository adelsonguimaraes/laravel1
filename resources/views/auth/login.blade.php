@extends('layouts.admin')

@section('title', 'Login')

@section('content')

    {{ print_r($_POST) }}

    @if(session('warning'))
        @component('components.alert')
            {{session('warning')}}
        @endcomponent
    @endif

    <form method="POST">
        @csrf
        <input type="email" name="email" placeholder="Digite um e-mail"/><br/>
        <input type="password" name="password" placeholder="Digite uma senha" /><br/>

        <input type="submit" value="Entrar">
    </form>

@endsection
