<div>
    @php
        $config = [
            'format' => 'DD/MM/YYYY HH:mm',
            'dayViewHeaderFormat' => 'MMM YYYY',
            'minDate' => 0,
            'maxDate' => "js:moment().endOf('month')",
            //'daysOfWeekDisabled' => [0, 6],
        ];
    @endphp

    <x-adminlte-input-date :config="$config"  id="fecha_adquisicion" name="fecha_adquisicion"
        placeholder="Elija una fecha..." igroup-size="sm"
        label-class="text" value={{$value}} required >
        <x-slot name="prependSlot">
            <x-adminlte-button theme="outline-info" icon="far fa-lg fa-calendar-alt" title="Fecha/Hora" />
        </x-slot>
    </x-adminlte-input-date>
</div>
