<div>
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}

        @error('name')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>

    <body>
        <div class="container py-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="h5">Lista de Permisos</h2>
                            @foreach ($permissions as $permission)
                                <div>
                                    <label>
                                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                        {{ $permission->description }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h2 class="h5">Nivel de Actuación</h2>
                            <div>
                                {!! Form::select('level', $levels, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</div>
