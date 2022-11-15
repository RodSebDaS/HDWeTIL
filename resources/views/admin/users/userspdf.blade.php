@extends('layouts.pdf')

@section('logo')
{{--     <a><img id="imagen" class="float-left rounded " src="{{ public_path('img/') . $config->logo }}"> </a>
 --}}@endsection

@section('datos')
    <p id="encabezado">
        {{--  <b>{{$config->nombre}}</b><br>
    {{$config->direccion}}<br>
    Telefono:{{$config->telefono}}<br>
    Email:{{$config->email}} --}}
    </p>
@endsection

@section('content')

    <div>
        <table id="titulo">
            <thead>
                <tr>
                    <th id="fac">Listado de Usuarios</th>
                </tr>
                <tr>
                    <th id="filtros">
                     {{--    {{ $filtro }} --}}
                    </th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
    </section>
    <br>
    <section>
        <div>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="users">
          
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td width="10px"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@section('cantidad')
 {{--    {{ $cant }} --}}
@endsection
@stop
