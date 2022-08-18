@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif

<div class="card">
    <div class="card-body">

        <table class="table table-striped shadow-lg mt-4" id="roles">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>

                        <td width="125px">
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                <a href="{{ route('admin.roles.edit', $role) }}"
                                    class="btn btn-sm btn-primary">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
