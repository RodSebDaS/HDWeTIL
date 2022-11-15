<div>
    <x-adminlte-modal id="modalCustom" title="Historial de Actividades:" size="lg" theme="teal" icon="fas fa-route"
        v-centered static-backdrop scrollable>
        <div style="height:300px">
           
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Aceptar" />
            <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}
    <x-adminlte-button data-toggle="modal" data-target="#modalCustom" icon="fas fa-route" class="btn btn-sm bg-teal" />
</div>
