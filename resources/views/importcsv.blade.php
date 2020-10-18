@extends('layouts\app')

@section('main')
<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1>Importar CSV</h1>
</div>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <form method='post' action='/importarcsvsave' enctype='multipart/form-data'>
        @csrf
        <input type="file" name='file'>
        <br><br>
        <button class="btn btn-primary btn-lg" type="submit" name='submit' value='Import'>Upload</button>
    </form>
</div>
@endsection