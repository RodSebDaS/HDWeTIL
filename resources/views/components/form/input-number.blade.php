@if (isset($readonly))
    <x-adminlte-input name="{{ $name }}" label="{{ $label }}" value="{{ $value }}"
        placeholder="Ingrese un numero..." type="money" igroup-size="sm" min="0" max="1000" readonly>
        <x-slot name="appendSlot">
            <div class="input-group-text bg-dark">
                <i class="fas fa-hashtag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
@elseif(isset($required))
    <x-adminlte-input name="{{ $name }}" label="{{ $label }}" value="{{ $value }}"
        placeholder="Ingrese un numero..." type="money" igroup-size="sm" min="0" max="1000" required>
        <x-slot name="appendSlot">
            <div class="input-group-text bg-dark">
                <i class="fas fa-hashtag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
@else
    <x-adminlte-input name="{{ $name }}" label="{{ $label }}" value="{{ $value }}"
        placeholder="Ingrese un numero..." type="money" igroup-size="sm" min="0" max="1000">
        <x-slot name="appendSlot">
            <div class="input-group-text bg-dark">
                <i class="fas fa-hashtag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
@endif
