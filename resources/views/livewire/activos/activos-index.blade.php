<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped shadow-lg mt-4 display" style="width:100%" id="activos">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Ingreso</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ubicación</th>
                        <th>Estado</th>
                        <th>Valor Actual</th>
                        <th>Vida Útil</th>
                        <th>Amortización</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{--    @foreach ($solicitudes as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->created_at->diffforHumans() }}</td>
                            <td>{{ $post->titulo }}</td>
                            @if ($post->servicio_id !== null)
                                <td>{{ $post->Servicio->nombre }}</td>
                            @else
                                <td>{{ $post->servicio_id = null }}</td>
                            @endif
                            @if ($post->activo_id !== null)
                                <td>{{ $post->Activo->nombre }}</td>
                            @else
                                <td>{{ $post->activo_id = null }} </td>
                            @endif
                            <td>{{ $post->Estado->nombre }}</td>
                            <td>{{ $post->FlujoValor->nombre }}</td>
                            <td>{{ $post->Prioridad->nombre }}</td>
                            @if ($post->sla == '')
                                <td>{{ $post->sla }}</td>
                            @else
                                <td>{{ $post->sla->diffforHumans() }}</td>
                            @endif
                            <td width="100px">
                                {{-- @include('posts.partials.actions') 
                            </td>
                        </tr>
                    @endforeach  --}}
                </tbody>
                
            </table>
        </div>
    </div>
</div>
