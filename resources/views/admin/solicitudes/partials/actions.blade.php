
<form action="{{ route('admin.solicitudes.destroy', $id) }}" method="POST">
    <a href="{{ route('admin.solicitudes.edit', $id) }}" class="btn btn-sm btn-primary">Editar</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
</form>