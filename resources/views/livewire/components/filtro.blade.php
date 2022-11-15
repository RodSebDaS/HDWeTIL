<div>
    {{--  <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Buscar por:
                </div>
                <div class="card-tools" id="filtroCard">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div> --}}
    @if (!empty($users))
        <x-filtro :collection=$users>
            {{-- Nombre --}}
            <x-slot name="nombre">
                <x-adminlte-input name="nombre" label="Nombre:" placeholder="Ingrese un nombre" class="form-control"
                    igroup-size="sm" value="{{-- {{ old('titulo', $edit ? $post->titulo : '') }} --}}" />
            </x-slot>
            {{-- Desde --}}
            <x-slot name="fecha1">
                <x-form.input-date-filter name="desde" label="Desde:" placeholder="Ingrese una fecha"
                    class="form-control" value="" />
            </x-slot>
            {{-- Hasta --}}
            <x-slot name="fecha2">
                <x-form.input-date-filter name="hasta" label="Hasta:" placeholder="Ingrese una fecha"
                    class="form-control" value="" />
            </x-slot>
            {{-- Email --}}
            <x-slot name="email">
                <x-adminlte-input name="email" label="Email:" placeholder="Ingrese un email" class="form-control"
                    igroup-size="sm" value="{{-- {{ old('titulo', $edit ? $post->titulo : '') }} --}}" />
            </x-slot>
        </x-filtro>
    @elseif (!empty($posts))
        <x-filtro :collection=$posts>
            {{-- Título --}}
            <x-slot name="titulo">
                <x-adminlte-input name="titulo" label="Título:" placeholder="Ingrese un título" class="form-control"
                    igroup-size="sm" value="{{-- {{ old('titulo', $edit ? $post->titulo : '') }} --}}" />
            </x-slot>
            {{-- Desde --}}
            <x-slot name="fecha1">
                <x-form.input-date-filter name="desde" label="Desde:" placeholder="Ingrese una fecha"
                    class="form-control" value="" />
            </x-slot>
            {{-- Hasta --}}
            <x-slot name="fecha2">
                <x-form.input-date-filter name="hasta" label="Hasta:" placeholder="Ingrese una fecha"
                    class="form-control" value="" />
            </x-slot>
            {{-- SLA --}}
            <x-slot name="fecha3">
                <x-form.input-date-filter name="sla" label="SLA:" placeholder="Ingrese una fecha" class="form-control"
                    value="" />
            </x-slot>
            {{-- Tipo --}}
            <x-slot name="tipo">
                <x-adminlte-select2 name="tipo_id" label="Tipo:" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="far fa-clone"></i>
                        </div>
                    </x-slot>
                    @php $selected = old('tipo_id') @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    <option></option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ $selected == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
            </x-slot>
            {{-- Propiedad --}}
            <x-slot name="prioridad">
                <x-adminlte-select2 name="prioridad_id" label="Prioridad:" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </x-slot>
                    @php $selected = old('prioridad_id') @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    <option></option>
                    @foreach ($prioridades as $prioridad)
                        <option value="{{ $prioridad->id }}" {{ $selected == $prioridad->id ? 'selected' : '' }}>
                            {{ $prioridad->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
            </x-slot>
            {{-- Estado --}}
            <x-slot name="estado">
                <x-adminlte-select2 name="estado_id" label="Estado:" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-file-export"></i>
                        </div>
                    </x-slot>
                    @php $selected = old('estado_id') @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    <option></option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ $selected == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
            </x-slot>
            {{-- Etapa --}}
            <x-slot name="etapa">
                <x-adminlte-select2 name="flujovalor_id" label="Etapa:" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                    </x-slot>
                    @php $selected = old('flujovalor_id') @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    <option></option>
                    @foreach ($flujovalores as $flujovalor)
                        <option value="{{ $flujovalor->id }}" {{ $selected == $flujovalor->id ? 'selected' : '' }}>
                            {{ $flujovalor->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
            </x-slot>
        </x-filtro>
    @endif
</div>
{{-- </div> --}}
