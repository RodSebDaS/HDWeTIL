@php
    $config = [
        'title' => 'Seleccione opción...',
        'liveSearch' => true,
        'liveSearchPlaceholder' => 'Buscar...',
        'showTick' => true,
        'actionsBox' => true,
        'selectAllText' => 'Seleccionar Todo',
        'deselectAllText' => 'Deseleccionar Todo',
    ];
@endphp
<x-adminlte-select-bs id="grupo" name="grupo[]" label="Grupo:" label-class="text-black" igroup-size="sm"
    :config="$config" multiple>
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-green">
            <i class="fas fa-users"></i>
        </div>
    </x-slot>
     @php $selected = old('selBsCategory') @endphp
  <option disabled {{ empty($selected) ? '' : '' }}></option> 
    @foreach ($valores as $valor)
        <option value="{{ $valor->id }}" {{ $selected == $valor->id ? 'selected' : '' }}>{{ $valor->name }}</option>
    @endforeach
</x-adminlte-select-bs>
