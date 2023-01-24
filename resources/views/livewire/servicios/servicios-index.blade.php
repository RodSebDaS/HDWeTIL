<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped {{--table-bordered--}} table-condensed shadow-lg mt-4" width="100%" id="servicios">
                <thead class="bg-primary text-white">
                    <tr>
                        <th >ID</th>
                        <th>Fecha Inicio</th>
                        <th>Descripción</th>
                        <th>Calificación</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{--    @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->id }}</td>
                            <td>{{ $servicio->created_at->diffforHumans() }}</td>
                            <td>{{ $servicio->descripción }}</td>
                            <td width="100px">
                                {{-- @include('servicios.partials.actions') 
                            </td>
                        </tr>
                    @endforeach  --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
