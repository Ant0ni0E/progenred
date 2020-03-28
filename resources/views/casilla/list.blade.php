@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}



</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <div class="row">
        <div class="col">
            <h1>Lista de casillas</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('casilla.create')}}"
                    class="btn btn-danger btn-block">NUEVA CASILLA</a></td>
        </div>
        <hr>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">UBICACIÓN</th>
            <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($casillas as $casilla)
            <tr>
                <td>{{$casilla->id}}</td>
                <td>{{$casilla->ubicacion}}</td>
                <td><a href="{{ route('casilla.edit', $casilla->id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('casilla.destroy', $casilla->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$casilla->ubicacion}}')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection