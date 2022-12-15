<div>
    @php $edit = isset($post);
    $ruta = Route::currentRouteName();
        if ($ruta=="solicitudes.edit" || $ruta=="posts.edit") {
            $sla = $post->sla->format('d/m/Y H:i');
        }else {
            $sla = $post->sla;
            if ($sla !== null) {
                $sla = $post->sla->format('d/m/Y H:i');
            }else {
                $sla = null;
            }
        }
    @endphp

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

    {{-- Fecha SLA --}}
    <x-form.input-date label="Fecha Límite(*):" value="{{ old('sla', $sla) }}" />
</div>
