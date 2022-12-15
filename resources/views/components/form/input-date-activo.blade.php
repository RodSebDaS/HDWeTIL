<div>
    @php
        $config = [
            'format' => 'DD/MM/YYYY',
            'dayViewHeaderFormat' => 'MMM YYYY',
            'minDate' => "js:moment().startOf('month')",
            'maxDate' => "js:moment().endOf('day')",
            'daysOfWeekDisabled' => [0, 6],
        ];
    @endphp
    <x-adminlte-input-date name="{{$name}}" :config="$config" placeholder="Eliga una fecha..." igroup-size="sm" label-class="text">
        <x-slot name="prependSlot" value="{{$value}}">
            <x-adminlte-button theme="outline-info" icon="far fa-lg fa-calendar-alt" title="Fecha/Hora" />
        </x-slot>
    </x-adminlte-input-date>
</div>
