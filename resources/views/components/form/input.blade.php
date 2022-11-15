@if (isset($readonly))
    <x-adminlte-input name="{{ $name }}" label="{{ $label }}" placeholder="{{ $placeholder }}"
        fgroup-class="col-md-12" value="{{ $value }}" readonly />
@else
    <x-adminlte-input name="{{ $name }}" label="{{ $label }}" placeholder="{{ $placeholder }}"
        fgroup-class="col-md-12" value="{{ $value }}" />
@endif
