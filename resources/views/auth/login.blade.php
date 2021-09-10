@extends('layouts.admin')

@section('title', 'Login')

@section('content')

    @if(session('warning'))
        @component('components.alert')
            {{session('warning')}}
        @endcomponent
    @endif


    <form method="POST">
        @csrf
        <input type="email" name="email" placeholder="Digite um e-mail"/><br/>
        <input type="password" name="password" placeholder="Digite uma senha" /><br/>

        @if($tries>=3)
            {{-- {{__('messages.tryerror', ['count'=>3])}} --}}
            @lang('messages.tryerror', ['count'=>3])
        @else 
            <input type="submit" value="Entrar">
        @endif
    </form>

    Tentativas: {{ $tries }}

@endsection
