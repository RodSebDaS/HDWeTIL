<div> 
    @if ((Auth::User()->hasRole('Admin')))
        <x-actions 
        puedeVer="posts.show" rutaShow="{{ route('posts.show', $post_id) }}"
        puedeEditar="false" rutaEdit="{{ route('posts.edit', $post_id) }}"
        puedeEliminar="posts.destroy" rutaDestroy="{{ route('posts.destroy', $post_id) }}"
        puedeHistorial="historial.show" rutaHistorial="{{ route('historial.show', $post_id) }}"/>
    @else
        <x-actions 
        puedeVer="posts.show" rutaShow="{{ route('posts.show', $id) }}"
        puedeEditar="false" rutaEdit="{{ route('posts.edit', $id) }}"
        puedeEliminar="posts.destroy" rutaDestroy="{{ route('posts.destroy', $id) }}"
        puedeHistorial="historial.show" rutaHistorial="{{ route('historial.show', $id) }}"/>
    @endif
</div>