<div>
    <x-adminlte-modal id="{{ $id }}" title="{{ $title }}" size="lg" theme="{{ $theme }}"
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
            {{--  <x-adminlte-button class="mr-auto" theme="success" label="Aceptar" /> --}}
            {{--   <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" /> --}}
        </x-slot>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}
    <a id="tooltiphelp" data-toggle="tooltip" data-placement="top" title="{{ $title }}">
        <x-adminlte-button theme="{{ $theme }}" label="{{ $titlebtn }}" data-toggle="modal"
            data-target="#{{ $id }}" data-backdrop="static" class="{{ $class }}"
            icon="{{ $icon }}" />
    </a>
</div>
