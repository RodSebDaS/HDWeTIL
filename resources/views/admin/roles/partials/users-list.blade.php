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
                    <th>Nivel</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->level }}</td>

                        <td width="125px">
                            @include('admin.roles.partials.actions')
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
