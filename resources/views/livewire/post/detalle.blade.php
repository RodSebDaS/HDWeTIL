<div>
    <x-adminlte-card title="Detalle" theme="primary" theme-mode="sm" icon="" collapsible="collapsed">

        {{-- Tipo --}}
        {{-- <x-adminlte-select2 name="tipo" label="Tipo(*):" label-class="text" igroup-size="sm"
        data-placeholder="Seleccione una opción...">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="far fa-clone"></i>
            </div>
        </x-slot>
        @php $selected = old('tipo', ($edit ?  $post->prioridad_id : '')) @endphp
        <option disabled {{ empty($selected) ? '' : '' }}></option>
       <option></option>
        @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{ $selected == $tipo->id ? 'selected' : '' }}>
                {{ $tipo->nombre }}</option>
        @endforeach
        </x-adminlte-select2> --}}

        {{-- Propiedad --}}
        <x-adminlte-select2 name="prioridad_id" label="Prioridad(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </x-slot>
            @php $selected = old('prioridad_id', ($edit ?  $post->prioridad_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            {{-- <option></option> --}}
            @foreach ($prioridades as $prioridad)
                <option value="{{ $prioridad->id }}" {{ $selected == $prioridad->id ? 'selected' : '' }}>
                    {{ $prioridad->nombre }}</option>
            @endforeach
        </x-adminlte-select2>

        {{-- Servicio --}}
        <x-adminlte-select2 name="servicio_id" label="Servicio(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-server"></i>
                </div>
            </x-slot>
            <option></option>
            @php $selected = old('servicio_id', ($edit ?  $post->servicio_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            @foreach ($servicios as $servicio)
                <option value="{{ $servicio->id }}" {{ $selected == $servicio->id ? 'selected' : '' }}>
                    {{ $servicio->nombre }}</option>
            @endforeach
        </x-adminlte-select2>

        {{-- Activo --}}
        <x-adminlte-select2 name="activo_id" label="Activo(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-desktop"></i>
                </div>
            </x-slot>
            <option></option>
            @php $selected = old('activo_id', ($edit ?  $post->activo_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            @foreach ($activos as $activo)
                <option value="{{ $activo->id }}" {{ $selected == $activo->id ? 'selected' : '' }}>
                    {{ $activo->nombre }}</option>
            @endforeach
        </x-adminlte-select2>
    </x-adminlte-card>
</div>
