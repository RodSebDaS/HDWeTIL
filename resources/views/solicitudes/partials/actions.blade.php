<div>
    @if ((Auth::User()->hasRole('Admin')))
        <x-actions puedeVer="solicitudes.show" rutaShow="{{ route('solicitudes.show', $post_id) }}"
        puedeEditar="false" rutaEdit="{{ route('solicitudes.edit', $post_id) }}"
        puedeEliminar="solicitudes.destroy" rutaDestroy="{{ route('solicitudes.destroy', $post_id) }}"
        puedeHistorial="historial.show" rutaHistorial="{{ route('historial.show', $post_id) }}" />
    @else
        <x-actions puedeVer="solicitudes.show" rutaShow="{{ route('solicitudes.show', $id) }}"
        puedeEditar="false" rutaEdit="{{ route('solicitudes.edit', $id) }}"
        puedeEliminar="solicitudes.destroy" rutaDestroy="{{ route('solicitudes.destroy', $id) }}"
        puedeHistorial="historial.show" rutaHistorial="{{ route('historial.show', $id) }}" />
    @endif
</div>
