<div>
    <x-actions puedeVer="posts.show" rutaShow="{{ route('solicitudes.show', $id) }}"
         puedeEditar="posts.edit" rutaEdit="{{ route('posts.edit', $id) }}"
        puedeEliminar="posts.destroy" rutaDestroy="{{ route('posts.destroy', $id) }}"/>
</div>