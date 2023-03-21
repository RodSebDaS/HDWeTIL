
<div>
    @php $edit = isset($post);@endphp

    <div class="container">
        <h3 class="text-center display-7">Preguntas Frecuentes</h3>
    </div>
    <!-- Main content -->
    <div class="col-md-12">
        <form action="{{ '/home/posts/buscar' }}">
            @csrf
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    {{-- Buscador --}}
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input wire:model="search" id="search" name="search" type="search"
                                class="form-control form-control-lg" placeholder="Buscar...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <p class="py-2">
            <a class="btn btn-primary btn-tool float-right" data-toggle="collapse" href="#collapseFiltroSearch"
                role="button" aria-expanded="false" aria-controls="collapseFiltroSearch">
                <i class="fas fa-filter"></i>
            </a>
        </p>
      
        {{-- Filtros --}}
        <div class="collapsed" id="collapseFiltroSearch">
            <div class="container d-flex justify-content-center align-items-center">
                <div class="card card-body bg-light col-11">
                    <div class="row justify-content-md-center">
                        <div class="col-3">
                            <div wire:ignore class="form-group">
                                {{-- Tipo --}}
                                <x-adminlte-select2 wire:defer="tipo_id" name="tipo_id" label="Tipo:"
                                    label-class="text" igroup-size="sm" data-placeholder="Sin Asignar...">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="far fa-clone"></i>
                                        </div>
                                    </x-slot>
                                    @php $selected = old('tipo_id', ($edit ?  $edit->tipo_id : '')) @endphp
                                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                                    <option>Todos</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}"
                                            {{ $selected == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->nombre }}</option>
                                    @endforeach
                                </x-adminlte-select2>
                            </div>
                        </div>
                        <div class="col-3">
                            <div wire:ignore class="form-group">
                                {{-- Prioridad --}}
                                <x-adminlte-select2 wire:defer="prioridad_id" name="prioridad_id" label="Prioridad:"
                                    label-class="text" igroup-size="sm" data-placeholder="Seleccione una opción...">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                    </x-slot>
                                    @php $selected = old('prioridad_id', ($edit ?  $edit->prioridad_id : '')) @endphp
                                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                                    <option>Todas</option>
                                    @foreach ($prioridades as $prioridad)
                                        <option value="{{ $prioridad->id }}"
                                            {{ $selected == $prioridad->id ? 'selected' : '' }}>
                                            {{ $prioridad->nombre }}</option>
                                    @endforeach
                                </x-adminlte-select2>
                            </div>
                        </div>
                        <div class="col-3">
                            <div wire:ignore class="form-group">
                                {{-- Servicio --}}
                                <x-adminlte-select2 id="servicio_id" name="servicio_id" label="Servicio(*):"
                                    label-class="text" igroup-size="sm" data-placeholder="Seleccione una opción..."
                                    required>
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fas fa-server"></i>
                                        </div>
                                    </x-slot>
                                    <option>Sin Asignar</option>
                                    @php $selected = old('servicio_id', ($edit ?  $post->servicio_id : '')) @endphp
                                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                                    @foreach ($servicios as $servicio)
                                        <option value="{{ $servicio->id }}"
                                            {{ $selected == $servicio->id ? 'selected' : '' }}>
                                            {{ $servicio->nombre }}</option>
                                    @endforeach
                                </x-adminlte-select2>
                            </div>
                        </div>
                        <div class="col-3">
                            <div wire:ignore class="form-group">
                                {{-- Activo --}}
                                <x-adminlte-select2 id="activo_id" name="activo_id" label="Activo(*):"
                                    label-class="text" igroup-size="sm" data-placeholder="Seleccione una opción..."
                                    required>
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fas fa-desktop"></i>
                                        </div>
                                    </x-slot>
                                    <option>Sin Asignar</option>
                                    @php $selected = old('activo_id', ($edit ?  $post->activo_id : '')) @endphp
                                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                                    @foreach ($activos as $activo)
                                        <option value="{{ $activo->id }}"
                                            {{ $selected == $activo->id ? 'selected' : '' }}>
                                            {{ $activo->nombre . ' ' . $activo->marca->nombre . ' ' . $activo->modelo->nombre }}
                                        </option>
                                    @endforeach
                                </x-adminlte-select2>
                            </div>
                        </div>
                        @php
                            $config = [
                                'format' => 'DD/MM/YYYY',
                                'dayViewHeaderFormat' => 'MMM YYYY',
                                'minDate' => "js:moment().startOf('year')",
                                'maxDate' => "js:moment().endOf('day')",
                            ];
                        @endphp
                        <div class="col-3">
                            <div class="form-group">
                                {{-- Fecha Desde --}}
                                <div>
                                    <x-adminlte-input-date :config="$config" id="desde" name="desde"
                                        placeholder="Elija una fecha..." igroup-size="sm" label-class="text"
                                        value="{{ old('desde') }}" label="Fecha Desde:">
                                        <x-slot name="prependSlot">
                                            <x-adminlte-button theme="outline-info" icon="far fa-lg fa-calendar-alt"
                                                title="Fecha Desde" />
                                        </x-slot>
                                    </x-adminlte-input-date>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                {{-- Fecha Hasta --}}
                                <div>
                                    <x-adminlte-input-date :config="$config" id="hasta" name="hasta"
                                        placeholder="Elija una fecha..." igroup-size="sm" label-class="text"
                                        value="{{ old('hasta') }}" label="Fecha Hasta:">
                                        <x-slot name="prependSlot">
                                            <x-adminlte-button theme="outline-info" icon="far fa-lg fa-calendar-alt"
                                                title="Fecha Hasta" />
                                        </x-slot>
                                    </x-adminlte-input-date>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div wire:ignore class="form-group">
                                <div class="form-group">
                                    {{-- Orden-Sentido --}}
                                    <x-adminlte-select wire:defer="orden" id="orden_id" name="orden_id"
                                        label="Orden:" label-class="text" igroup-size="sm"
                                        data-placeholder="Seleccione una opción...">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text bg-gradient-info">
                                                <i class="fas fa-sort"></i>
                                            </div>
                                        </x-slot>
                                        @php $selected = old('orden_id', ($edit ? 'orden_id' : '')) @endphp
                                        {{-- <option></option> --}}
                                        <option selected>asc</option>
                                        <option>desc</option>
                                    </x-adminlte-select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <hr>
    @foreach ($posts as $post)
        <div class="container">
            <ul>
                <div class="col-12 mt-3">
                    <div class="col-md-12">
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="row">
                                    <div id="accordion" class="container-fluid">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4 class="card-title w-100">
                                                    <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                        href="#collapseOne" aria-expanded="false">
                                                        <h6>
                                                            <li><strong>{{ $post->titulo }}<strong> <i
                                                                            class="fas fa-question"></i></li>
                                                        </h6>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="collapse" data-parent="#accordion"
                                                style="">
                                                <div class="card-body">
                                                    <div class="col px-4">
                                                        <div>
                                                            <div class="float-right font-weight-normal font-italic">
                                                                {{ $post->created_at->format('d/m/Y H:i') }}
                                                            </div>
                                                            {{-- <h6>{{ $post->titulo }}</h6> --}}
                                                            <div class="mb-4 mt-4 font-weight-normal">
                                                                {!! $post->descripcion !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        @if ($post->puntajes->sum('calificacion') !== 0 && $post->puntajes->sum('calificacion') !== null)
                                                            <label>Votos:
                                                                {{ $post->puntajes->count() }}</label>&nbsp;<label>Puntaje:
                                                                {{ round($post->puntajes->sum('calificacion') / $post->puntajes->count(), 2) }}</label>
                                                        @else
                                                            <label>Votos:{{ 0 }}</label>&nbsp;<label>Puntaje:{{ 0 }}</label>
                                                        @endif
                                                        <a href="{{ route('posts.respuesta', $post->id) }}"
                                                            class="btn btn-success btn-xs float-right">Respuesta</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    @endforeach
    
</div>
