<div>
    @php
    $config = [
        'format' => 'DD/MM/YYYY HH:mm',
        'dayViewHeaderFormat' => 'MMM YYYY',
        'minDate' => "js:moment().startOf('day')",
        'maxDate' => "js:moment().endOf('year')",
        'daysOfWeekDisabled' => [0, 6],
    ];
    @endphp
    
    <x-adminlte-input-date :config="$config" id="inputDateSla" name="sla"
    placeholder="Eliga una fecha..." igroup-size="sm" label="Fecha de solución esperada:"
    label-class="text" value={{$value}}>
    <x-slot name="prependSlot">
        <x-adminlte-button theme="outline-info" icon="far fa-lg fa-calendar-alt" title="Fecha/Hora" />
    </x-slot>
    </x-adminlte-input-date>
</div>
