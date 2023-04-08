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
                    <h2 class="h5">Lista de Permisos</h2>
                    <div class="row mt-3">
                            @foreach ($permissions as $permission)
                                <div class="col-md-4">
                                    <div>
                                        <label>
                                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                            {{ $permission->description }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            
                        <div class="col-md-4 py-3">
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
