<div>
    <x-actions puedeVer="solicitudes.show" rutaShow="{{ route('solicitudes.show', $id) }}"
        puedeEditar="false" rutaEdit="{{ route('solicitudes.edit', $id) }}"
        puedeEliminar="solicitudes.destroy" rutaDestroy="{{ route('solicitudes.destroy', $id) }}"
        puedeHistorial="historial.show" rutaHistorial="{{ route('historial.show', $id) }}" />
</div>
