<div>
    @php
        $config = [
            'format' => 'DD/MM/YYYY HH:mm',
            'dayViewHeaderFormat' => 'MMM YYYY',
            'minDate' => "js:moment().startOf('month')",
            'maxDate' => "js:moment().endOf('day')",
            'daysOfWeekDisabled' => [0, 6],
        ];
    @endphp

    <x-adminlte-input-date :config="$config"  id="{{$id}}" name="{{$name}}"
    placeholder="Elija una fecha..." igroup-size="sm"
    label-class="text" value={{$value}} required >
    <x-slot name="prependSlot">
        <x-adminlte-button theme="outline-info" icon="far fa-lg fa-calendar-alt" title="Fecha/Hora" />
    </x-slot>
    </x-adminlte-input-date>

</div>
