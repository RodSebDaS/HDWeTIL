<div>
    <x-actions puedeVer="solicitudes.show" rutaShow="{{ route('solicitudes.show', $id) }}"
        puedeEditar="solicitudes.edit" rutaEdit="{{ route('solicitudes.edit', $id) }}"
        puedeEliminar="solicitudes.destroy" rutaDestroy="{{ route('solicitudes.destroy', $id) }}"
        rutaHistorial="{{ $id }}" />
</div>
