
<form action="{{ route('admin.solicitudes.destroy', $id) }}" method="POST">
    @csrf
    <a href="{{ route('admin.solicitudes.edit', $id) }}">
        <x-adminlte-button label="Editar" theme="primary" class="btn btn-sm"/></a>
    @method('DELETE')
    <x-adminlte-button type="delete" label="Eliminar" theme="danger" class="btn btn-sm"/>
</form>
