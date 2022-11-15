<div>
    <x-adminlte-card class="btn btn-tool btn-xs" title="Buscar por:" collapsible="collapsed">
        <x-slot name="filtro"></x-slot>
        <form class="form-group no-gutters" method="GET" action="{{ route('datatable.filtro') }}">
            @csrf
            <div class="row text-left">
            
                @if (count($collection->whereInstanceOf('App\Models\User'))>0)
                    {{-- Título --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $nombre }}
                        </div>
                    </div>
                    {{-- Desde --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $fecha1 }}
                        </div>
                    </div>
                    {{-- Hasta --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $fecha2 }}
                        </div>
                    </div>
                     {{-- Email --}}
                     <div class="col-md-3">
                        <div class="form-group">
                            {{ $email }}
                        </div>
                    </div>
                    
                @elseif (count($collection->whereInstanceOf('App\Models\Post'))>0)

                    {{-- Título --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $titulo }}
                        </div>
                    </div>
                    {{-- Desde --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $fecha1 }}
                        </div>
                    </div>
                    {{-- Hasta --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $fecha2 }}
                        </div>
                    </div>
                    {{-- SLA --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $fecha3 }}
                        </div>
                    </div>
                    {{-- Tipo --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $tipo }}
                        </div>
                    </div>
                    {{-- Propiedad --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $prioridad }}
                        </div>
                    </div>
                    {{-- Estado --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $estado }}
                        </div>
                    </div>
                    {{-- Etapa --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            {{ $etapa }}
                        </div>
                    </div>
                @endif
                <div class="d-flex">
                    <div class="ml-auto mt-2">
                        <button type="reset" class="btn btn-secondary btn-xs" id="limpiar">Limpiar <i
                                class="fas fa-filter"></i></button>
                        <button class="btn btn-primary btn-xs" id="filtrar">Filtrar <i
                                class="fas fa-filter "></i></button>
                    </div>
                </div>
            </div>
        </form>
    </x-adminlte-card>
</div>
