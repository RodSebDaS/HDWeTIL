<div>
    @php $edit = isset($post);
    /*$ruta = Route::currentRouteName();
        if ($ruta=="solicitudes.create" || $ruta=="posts.create") {
            $sla = $post->sla ;
        }else {
            $sla = $post->sla;
            if ($sla !== null) {
                $sla = $post->sla->format('d/m/Y H:i');
            }else {
                $sla = null;
            }
        }*/
    @endphp

    {{-- Detalle --}}

    {{-- @livewire('post.detalle', ['post' => $post]) --}}

    {{-- Tipo --}}
    <x-adminlte-select2 name="tipo_id" label="Tipo(*):" label-class="text" igroup-size="sm"
        data-placeholder="Seleccione una opción...">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="far fa-clone"></i>
            </div>
        </x-slot>
        @php $selected = old('tipo_id', ($edit ?  $post->tipo_id : '')) @endphp
        <option disabled {{ empty($selected) ? '' : '' }}></option>
        {{-- <option></option> --}}
        @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{ $selected == $tipo->id ? 'selected' : '' }}>
                {{ $tipo->nombre }}</option>
        @endforeach
    </x-adminlte-select2>

    {{-- Propiedad --}}
    <x-adminlte-select2 id="prioridad_id" name="prioridad_id" label="Prioridad(*):" label-class="text" igroup-size="sm"
        placeholder="Seleccione una opción..." required>
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-tachometer-alt"></i>
            </div>
        </x-slot>
        <option>Sin Asignar</option>
        @php $selected = old('prioridad_id', ($edit ?  $post->prioridad_id : '')) @endphp
        <option disabled {{ empty($selected) ? '' : '' }}></option>
        @foreach ($prioridades as $prioridad)
            <option value="{{ $prioridad->id }}" {{ $selected == $prioridad->id ? 'selected' : '' }}>
                {{ $prioridad->nombre }}</option>
        @endforeach
    </x-adminlte-select2>

    {{-- Servicio --}}
    <x-adminlte-select2 id="servicio_id" name="servicio_id" label="Servicio(*):" label-class="text" igroup-size="sm"
        data-placeholder="Seleccione una opción..." required>
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-server"></i>
            </div>
        </x-slot>
        <option>Sin Asignar</option>
        @php $selected = old('servicio_id', ($edit ?  $post->servicio_id : '')) @endphp
        <option disabled {{ empty($selected) ? '' : '' }}></option>
        @foreach ($servicios as $servicio)
            <option value="{{ $servicio->id }}" {{ $selected == $servicio->id ? 'selected' : '' }}>
                {{ $servicio->nombre }}</option>
        @endforeach
    </x-adminlte-select2>
    {{-- Activo --}}
    <x-adminlte-select2 id="activo_id" name="activo_id" label="Activo(*):" label-class="text" igroup-size="sm"
        data-placeholder="Seleccione una opción..." required>
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-desktop"></i>
            </div>
        </x-slot>
        <option>Sin Asignar</option>
        @php $selected = old('activo_id', ($edit ?  $post->activo_id : '')) @endphp
        <option disabled {{ empty($selected) ? '' : '' }}></option>
        @foreach ($activos as $activo)
            <option value="{{ $activo->id }}" {{ $selected == $activo->id ? 'selected' : '' }}>
                {{ $activo->nombre . ' ' . $activo->marca->nombre . ' ' . $activo->modelo->nombre }}</option>
        @endforeach
    </x-adminlte-select2>

    {{-- Fecha SLA 
    <x-form.input-date label="Fecha Límite(*):" value="{{ old('sla', $sla) }}" /> --}}

</div>
