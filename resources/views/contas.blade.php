@extends('layouts\app')

@section('main')
<div>
    <a href="/contas/novaconta"><button class="btn btn-primary btn-lg">Nova Conta</button></a>
</div>

<br>

<table class="table table-ordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>CPF</th>
            <th>Conta</th>
            <th>Tipo</th>
            <th>Agencia</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contas as $conta)
        <tr>
            <th>{{ $conta->id }}</th>
            <th>{{ $clientes->find($conta->id_cliente)->cpf }}</th>
            <th>{{ $conta->conta }}</th>
            @if ($conta->tipo == 1)
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
        @endforeach
        
    </tbody>
</table>

@endsection