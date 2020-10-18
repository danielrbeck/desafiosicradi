@extends('layouts\app')

@section('main')
<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>Conteúdo do CSV</h1>
    <table class="table table-ordered table-hover">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Conta</th>
                <th>Tipo</th>
                <th>Agencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contas as $row)
            <tr>
                <th>{{ $row[0] }}</th>
                <th>{{ $row[1] }}</th>
                <th>{{ $row[2] }}</th>   
                <th>{{ $row[3] }}</th>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    @if ($erros)
        <div class="card-deck  text-center">
            <div class="card shadow-sm">
                <div class="card-header bg-danger">
                    <h4 class="font-weight-normal">Erros ao importar:</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3">
                        @foreach ($erros as $erro)
                            {{$erro}}<br>   
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    


</div>
@endsection