@extends('layouts\app')

@section('main')
    
<div class="card border">
    <div class="card-body">
        <form action="/contas/novaconta/salvar" method="POST">
            @csrf
            <div class="form-group">

                <label for="id_cliente">Cliente</label>
                <select class="custom-select form-control" name="id_cliente" id="id_cliente">
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                    @endforeach
                </select><br>

                <label for="conta">Numero da Conta</label>
                <input type="number" class="form-control" name="conta"
                    id="conta" ><br>

                <label for="tipo">Tipo de Conta</label>
                <select class="custom-select form-control" name="tipo" id="tipo">
                    <option value="1">Conta Corrente</option>
                    <option value="2">Conta Poupança</option>
                </select><br>

                <label for="agencia">Agência</label>
                <input type="number" class="form-control" name="agencia"
                    id="agencia" ><br>
                           
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Salvar</button>
        </form>
    </div>
</div>

@endsection