@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')

<h1> Configurações </h1>

@component('components.alert')
    @slot('type') ERRO: @endslot
    Testando 1,2,3...
@endcomponent

LISTA DO BOLO:
<ul>
    @forelse($lista as $item)
        <li>{{$item}}</li>
    @empty
        <li>NÃO HÁ INGREDIENTES</li>
    @endforelse
</ul>



<form method="POST">
    @csrf

    Nome:<br/>
    <input type="text" name="nome"/> <br/>

    Idade: <br/>
    <input type="text" name="idade"/><br/>

    Cidade: <br/>
    <input type="text" name="cidade"/><br/>

    <input type="submit" value="Enviar"/>

</form>
@endsection