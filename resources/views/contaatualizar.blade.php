@extends('layouts.app')

@section('main')

<div class="card border">
    <div class="card-body">
        <form action="/contas/atualizar/{{$conta->id}}" method="POST">
       
            @csrf
            @method("PUT")
            <div class="form-group">
                
                <label for="id_cliente">CPF de Conta</label>
                <select class="custom-select form-control" name="id_cliente" id="id_cliente">
                    <option value={{$conta->id_cliente}} selected>{{$clientes->find($conta->id_cliente)->cpf}} ({{$clientes->find($conta->id_cliente)->nome}})</option>
                    @foreach ($clientes as $cliente)
                        <option value={{$cliente->id}}>{{$cliente->cpf}} ({{$cliente->nome}})</option>
                    @endforeach
                </select><br>


                <label for="conta">Conta do Cliente</label>
                <input type="number" class="form-control" name="conta"
                    id="conta" value="{{$conta->conta}}"><br>
                
                <label for="tipo">Tipo de Conta</label>
                <select class="custom-select form-control" name="tipo" id="tipo">
                    <option value={{$conta->tipo}} selected>
                        @if ($conta->tipo == 1)
                            Conta Corrente
                        @else
                            Conta Poupança
                        @endif
                    </option>
                    <option value="1">Conta Corrente</option>
                    <option value="2">Conta Poupança</option>
                </select><br>

                <label for="agencia">Agencia da Conta</label>
                <input type="number" class="form-control" name="agencia"
                    id="agencia" value="{{$conta->agencia}}"><br>

            </div>
            <button class="btn btn-primary btn-lg" type="submit">Salvar</button>
        </form>
    </div>
</div>
@endsection