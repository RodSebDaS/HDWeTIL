<div>
    <x-actions puedeVer="activos.show" rutaShow="{{ route('activos.show', $id) }}"
        puedeEditar="activos.edit" rutaEdit="{{ route('activos.edit', $id) }}"
        puedeEliminar="activos.destroy" rutaDestroy="{{ route('activos.destroy', $id) }}"
        {{-- rutaHistorial="" --}} />
</div>
