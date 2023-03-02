<div>
    <x-adminlte-modal  id="{{ $id }}" title="{{ $title }}" size="lg" theme="{{ $theme }}"
        icon="{{ $icon }}" v-centered static-backdrop scrollable>
        <div style="{{ $style }}">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        <x-slot name="footerSlot">
            @isset($footerSlot)
                    {{ $footerSlot }}
            @endisset
            {{--   <x-adminlte-button class="mr-auto" theme="success" label="Aceptar" />
           <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" /> --}}
        </x-slot>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}
    @isset($btnSlot)
        <a>
            <x-adminlte-button type="submit" theme="success" label="Guardar" class="btn-sm float-right bg-success mr-1" icon="fas fa-save" />
        </a>
    @endisset
    <a id="tooltiphelp" data-toggle="tooltip" data-placement="top" title="{{ $title }}">
        <x-adminlte-button theme="{{ $theme }}" label="{{ $titlebtn }}" data-toggle="modal"
            data-target="#{{ $id }}" data-backdrop="static" class="{{ $class }}"
            icon="{{ $icon }}" />
    </a>
</div>
