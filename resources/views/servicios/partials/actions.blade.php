<div>
    <x-actions puedeVer="servicios.show" rutaShow="{{ route('servicios.show', $id) }}"
        puedeEditar="servicios.edit" rutaEdit="{{ route('servicios.edit', $id) }}"
        puedeEliminar="servicios.destroy" rutaDestroy="{{ route('servicios.destroy', $id) }}"
       {{--  rutaHistorial="" --}} />
</div>
