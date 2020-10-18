@extends('layouts\app')

@section('main')

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 for="nome">{{$cliente->nome}}</h1>
    <h3 for="cpf">{{$cliente->cpf}}</h3>
</div>
<br>

<table class="table table-ordered table-hover">
    <thead>
        <tr>
            <th>Conta</th>
            <th>Tipo</th>
            <th>Agencia</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contas as $conta)
        @if ($conta->id_cliente == $cliente->id)
        <tr>
            <th>{{ $conta->conta }}</th>
            @if ( $conta->tipo == 1)
                <th>Conta Corrente</th> 
            @else
                <th>Conta Poupança</th> 
            @endif
            <th>{{ $conta->agencia }}</th>
            <th>
                <a href="/contas/{{$conta->id}}">
                    <button class="btn btn-primary btn-lg">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
                <a href="/contas/delete/{{$conta->id}}">
                    <button class="btn btn-danger btn-lg">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </a>
                
            </th>
        </tr>
        @endif
        @endforeach
        
    </tbody>
</table>

@endsection