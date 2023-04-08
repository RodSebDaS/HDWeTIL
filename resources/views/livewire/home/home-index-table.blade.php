<div>
    <div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped {{--table-bordered table-responsive --}} table-condensed table-hover shadow-lg mt-4" width="100%" id="respuestas">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Creado</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Servicio</th>
                            <th>Activo</th>
                            <th>Prioridad</th>
                            <th>Calificación</th>
                            <th>Puntaje</th>
                            <th>Votos</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--    @foreach ($respuestas as $respuesta)
                            <tr>
                                <td>{{ $respuesta->id }}</td>
                                <td>{{ $respuesta->updated_at->diffforHumans() }}</td>
                                <td>{{ $respuesta->titulo }}</td>
                                <td width="100px">
                                    {{-- @include('admin.home.partials.actions') 
                                </td>
                            </tr>
                        @endforeach  --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
