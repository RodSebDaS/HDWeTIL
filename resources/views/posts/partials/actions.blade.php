<div>
    <x-actions puedeVer="posts.show" rutaShow="{{ route('posts.show', $id) }}"
         puedeEditar="posts.edit" rutaEdit="{{ route('posts.edit', $id) }}"
        puedeEliminar="posts.destroy" rutaDestroy="{{ route('posts.destroy', $id) }}"
        puedeHistorial="posts.historial" rutaHistorial="{{ route('historial.show', $id) }}"/>
</div>