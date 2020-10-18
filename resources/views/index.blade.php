@extends('layouts\app')

@section('main')
<div>
    <a href="/novocliente"><button class="btn btn-primary btn-lg">Novo Cliente</button></a>
</div>

<br>

<table class="table table-ordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <th>{{ $cliente->id }}</th>
            <th>{{ $cliente->nome }}</th>
            <th>{{ $cliente->cpf }}</th>
            <th>
                <a href="/cliente/{{$cliente->id}}">
                    <button class="btn btn-primary btn-lg">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
                <a href="/cliente/delete/{{$cliente->id}}">
                    <button class="btn btn-danger btn-lg">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </a>

                <a href="/cliente/contas/{{$cliente->id}}">
                    <button class="btn btn-success btn-lg">
                        <i class="fas fa-list"></i>
                    </button>
                </a>
            </th>
        </tr>
        @endforeach
        
    </tbody>
</table>

@endsection