<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contas;
use App\Models\Clientes;

class ContasControlador extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $contas = Contas::all();
        $clientes = Clientes::all();
        return view('contas', compact(['contas','clientes']));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $clientes = Clientes::all();
        return view('novaconta', compact(['clientes']));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $conta = new Contas();
        $conta->id_cliente = $request->input('id_cliente');
        $conta->conta = $request->input('conta');
        $conta->tipo = $request->input('tipo');
        $conta->agencia = $request->input('agencia');
        $conta->save();
        return redirect('/contas');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $clientes = Clientes::all();
        $conta = Contas::find($id);
        if (isset($conta)){
            return view('contaatualizar', compact(['conta','clientes']));
        }
        return redirect('/contas');
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {   
        $conta = Contas::find($id);
        if (isset($conta)){
            $conta->id_cliente = $request->input('id_cliente');
            $conta->conta = $request->input('conta');
            $conta->tipo = $request->input('tipo');
            $conta->agencia = $request->input('agencia');
            $conta->save();
            return redirect('/contas');
        }
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $conta = Contas::find($id);
        if (isset($conta)){
            $conta->delete();
        }
        return redirect('/contas');
    }
    
    public function importcsv()
    {
        return view('importcsv');
    }
    
    public function importcsvsave(Request $request)
    {
        $clientes = Clientes::all();
        $file = $request->file->getRealPath();
        $row = 1;
        $erros = [];
        $array = [];
            if (($arquivo = fopen($file, "r")) !== FALSE) {
              while (($data = fgetcsv($arquivo, 1000, ";")) !== FALSE) {
                $num = count($data);
                $row++;
                $array = [];
                for ($c=0; $c < $num; $c++) {
                    $array[] =  $data[$c];
                   
                }
                 $contas[] =  $array;
              }
              array_shift($contas);
              fclose($arquivo);
            }

        foreach ($contas as $conta){
            $cliente = Clientes::where('cpf',$conta[0])->first();       
            if($cliente){
                if(Contas::where('conta',$conta[1])->first()){
                    $erros[] = ('Conta ja existente:');
                    $erros[] = strval($conta[1]);
                } else {
                    $novaconta = new Contas();
                    $novaconta->id_cliente = $cliente->id;
                    $novaconta->conta = $conta[1];

                    if($conta[2] == 'Conta Corrente'){
                        $novaconta->tipo = 1;
                    } else {
                        $novaconta->tipo = 2;
                    }
                
                    $novaconta->agencia = $conta[3];
                    $novaconta->save();
                }
                
            } else {

                $erros[] = ('CPF de cliente não encontrado:');
                $erros[] = strval($conta[0]);
            }
            $cliente = null;
        }
        
        return view('importcsvsave', compact('contas', 'erros'));
    }
}
