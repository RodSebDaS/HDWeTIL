<div>
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-striped shadow-lg mt-4" id="solicitudes">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Creado</th>
                        <th>Asunto</th>
                        <th>Estado</th>
                        <th>Etapa</th>
                        {{-- <th>Prioridad</th> --}}
                        <th>Vencimiento SLA</th>
                        <th width="115px"></th>
                    </tr>
                </thead>
               <tbody>
                    @foreach ($posts as $solicitud)
                        <tr>
                            <td>{{ $solicitud->id }}</td>
                            <td>{{ $solicitud->created_at->diffforHumans() }}</td>
                            <td>{{ $solicitud->titulo }}</td>
                            <td>{{ $solicitud->Estado->nombre }}</td>
                            <td>{{ $solicitud->FlujoValor->nombre }}</td>
                         {{--    <td>{{ $solicitud->Prioridad->nombre }}</td> --}}
                            <td>{{ $solicitud->sla->diffforHumans() }}</td>
                             <td width="125px">
                                <form action="{{route('admin.solicitudes.destroy', $solicitud)}}" method="POST">
                                    <a href="{{route('admin.solicitudes.edit', $solicitud)}}" class= "btn btn-sm btn-primary">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class= "btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>  
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
