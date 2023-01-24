<div>
    <x-actions puedeVer="" rutaShow=""
        {{--puedeEditar="comentarios.edit" rutaEdit="{{ route('comentarios.edit', $comentario) }}"--}}
        puedeEliminar="comentarios.destroy" rutaDestroy="{{ route('comentarios.destroy', $comentario) }}"/>
</div>