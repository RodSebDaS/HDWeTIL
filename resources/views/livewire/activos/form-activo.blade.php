<div>
    @php $edit=isset($activo) @endphp
    @csrf
    
    @if ($accion == 'Create')
   
        <div class="row" wire:ignore>
            {{-- Nombre --}}
            <x-form.input name="nombre" label="Nombre(*):" placeholder="Ingrese un nombre" igroup-size="sm"
                value="{{ old('nombre', $edit ? $activo->nombre : '') }}" required />
        </div>
        <div>
            {{-- Tipo --}}
            <x-adminlte-select id="tipo_id" name="tipo_id" label="Tipo(*):" data-placeholder="Seleccione una opción..." igroup-size="sm">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="far fa-clone"></i>
                    </div>
                </x-slot>
               <option>Seleccione una opción...</option>
                @php $selected = old('tipo_id', ($edit ?  $activo->tipo_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ $selected == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}</option>
                @endforeach
            </x-adminlte-select> 
        </div>
        <div>
            {{-- Categoría --}}
            @if ($categorias != "" && $tipoActivo != null && $tipoActivo != "Seleccione una opción...")
                <x-adminlte-select id="categoria_id" name="categoria_id" label="Categoria(*):"
                    label-class="text" igroup-size="sm" data-placeholder="Seleccione una opción..." required class="col-12">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-list-ul"></i>
                        </div>
                    </x-slot>
                    {{--  <option>Seleccione una opción...</option> --}}
                    @php $selected = old('categoria_id', ($edit ?  $activo->categoria_id : '')) @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    @if (!is_null($categorias))
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}</option>
                            @endforeach
                    @endif
                </x-adminlte-select>
            @endif
        </div>
        <div>
            {{-- Marca --}}
            <x-adminlte-select id="marca_id" name="marca_id" label="Marca(*):" label-class="text"
                igroup-size="sm" data-placeholder="Seleccione una opción..." required>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="far fa-registered"></i>
                    </div>
                </x-slot>
                <option>Seleccione una opción...</option>
                @php $selected = old('marca_id', ($edit ?  $activo->marca_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ $selected == $marca->id ? 'selected' : '' }}>
                        {{ $marca->nombre }}</option>
                @endforeach
            </x-adminlte-select>
        </div>
        <div>
            {{-- Modelo --}}
            @if ($modelos != ""  && $tipoMarca != null && $tipoMarca != "Seleccione una opción...")
                <x-adminlte-select name="modelo_id" label="Modelo(*):" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción..." required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </x-slot>
                    {{--  <option>Seleccione una opción...</option> --}}
                    @php $selected = old('modelo_id', ($edit ? $activo->modelo_id : '')) @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    @if (!is_null($modelos))
                        @foreach ($modelos as $modelo)
                            <option value="{{ $modelo->id }}" {{ $selected == $modelo->id ? 'selected' : '' }}>
                                {{ $modelo->nombre }}</option>
                        @endforeach
                    @endif
                </x-adminlte-select>
            @endif
        </div>
        <div wire:ignore>
            {{-- Ubicación --}}
            <x-adminlte-select id="area_id" name="area_id" label="Ubicacion(*):" label-class="text" igroup-size="sm"
                data-placeholder="Seleccione una opción..." required>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                </x-slot>
                <option>Seleccione una opción...</option>
                @php $selected = old('area_id', ($edit ?  $activo->area_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}" {{ $selected == $area->id ? 'selected' : '' }}>
                        {{ $area->nombre }}</option>
                @endforeach
            </x-adminlte-select>
        </div>
        <div wire:ignore>
            {{-- Fecha Adquisición --}}
            <x-form.input-date-activo label="Fecha de Adquisición(*):" id="fecha_adquisicion"
                name="fecha_adquisicion"
                value="{{ old('fecha_adquisicion', $edit ? \Carbon\Carbon::parse($activo->fecha_adquisicion)->format('d/m/Y H:m') : '') }}"
                required />
        </div>
        <div wire:ignore>
            {{-- Valor Inicial --}}
            <x-form.input-money id="valor" name="valor" label="Valor Inicial(*):" placeholder="" igroup-size="sm"
                        value="{{ old('valor', $edit ? $activo->valor : '') }}" required />
        </div>
            {{-- Stock --}}
                <x-form.input-number wire:ignore id="stock" name="stock" label="Cantidad(*):"
                    value="{{ old('stock', $edit ? $activo->stock : '') }}" required />
        <div wire:ignore>
            {{-- Estado --}}
                <x-adminlte-select name="estado_id" label="Estado(*):" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción..." required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="far fa-star"></i>
                        </div>
                    </x-slot>
                    <option>Seleccione una opción...</option>
                    @php $selected = old('estado_id', ($edit ?  $activo->estado_id : '')) @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ $selected == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}</option>
                    @endforeach
                </x-adminlte-select>
        </div>
        <div wire:ignore>
            {{-- Descripción --}}
            <br>
            <div class="container-fluid">
                <div class="row {{-- justify-content-center --}}">
                    <div class="card card-secondary card-outline col-md-12">
                        <div class="card-header">
                            <h6 class="card-title"><strong># Descripción:</strong></h6>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="text-justify">
                                <label for="descripcion" class="form-label"></label>
                                <textarea id="descripcion" name="descripcion" class="form-control w-full" rows="6"
                                    placeholder="Ingrese una descripción detallada del bien...">{{ old('descripcion', $edit ? $activo->descripcion : '') }}</textarea>
                                <x-jet-input-error for="descripcion" class="text-danger py-3" />
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

    @elseif ($accion == 'Edit')

        <div class="row" wire:ignore>
            {{-- Nombre --}}
            <x-form.input name="nombre" label="Nombre(*):" placeholder="Ingrese un nombre" igroup-size="sm"
                value="{{ old('nombre', $edit ? $activo->nombre : '') }}" required />
        </div>
        <div>
            {{-- Tipo --}}
            <x-adminlte-select id="tipo_id" name="tipo_id" label="Tipo(*):" data-placeholder="Seleccione una opción..." igroup-size="sm">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="far fa-clone"></i>
                    </div>
                </x-slot>
               <option>Seleccione una opción...</option>
                @php $selected = old('tipo_id', ($edit ?  $activo->tipo_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ $selected == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}</option>
                @endforeach
            </x-adminlte-select> 
        </div>
        <div>
            {{-- Categoría --}}
            @if ($categorias != "" && $tipoActivo != null && $tipoActivo != "Seleccione una opción...")
                <x-adminlte-select id="categoria_id" name="categoria_id" label="Categoria(*):"
                    label-class="text" igroup-size="sm" data-placeholder="Seleccione una opción..." required class="col-12">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-list-ul"></i>
                        </div>
                    </x-slot>
                    {{--  <option>Seleccione una opción...</option> --}}
                    @php $selected = old('categoria_id', ($edit ?  $activo->categoria_id : '')) @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    @if (!is_null($categorias))
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}</option>
                            @endforeach
                    @endif
                </x-adminlte-select>
            @elseif ($categorias != "" && $tipoActivo != null && $tipoActivo == "Seleccione una opción...")   
            @else
                <x-adminlte-select id="categoria_id" name="categoria_id" label="Categoria(*):"
                    label-class="text" igroup-size="sm" data-placeholder="Seleccione una opción..." required class="col-12">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-list-ul"></i>
                        </div>
                    </x-slot>
                    {{--  <option>Seleccione una opción...</option> --}}
                    @php $selected = old('categoria_id', ($edit ?  $activo->categoria_id : '')) @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    @if (!is_null($categorias))
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}</option>
                            @endforeach
                    @endif
                </x-adminlte-select>
            @endif
        </div>
        <div>
            {{-- Marca --}}
            <x-adminlte-select id="marca_id" name="marca_id" label="Marca(*):" label-class="text"
                igroup-size="sm" data-placeholder="Seleccione una opción..." required>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="far fa-registered"></i>
                    </div>
                </x-slot>
                <option>Seleccione una opción...</option>
                @php $selected = old('marca_id', ($edit ?  $activo->marca_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ $selected == $marca->id ? 'selected' : '' }}>
                        {{ $marca->nombre }}</option>
                @endforeach
            </x-adminlte-select>
        </div>
        <div>
            {{-- Modelo --}}
            @if (count($modelos) > 0 && $tipoMarca != null && $tipoMarca != "Seleccione una opción...")
                <x-adminlte-select name="modelo_id" label="Modelo(*):" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción..." required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </x-slot>
                    {{--  <option>Seleccione una opción...</option> --}}
                    @php $selected = old('modelo_id', ($edit ? $activo->modelo_id : '')) @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    @if (!is_null($modelos))
                        @foreach ($modelos as $modelo)
                            <option value="{{ $modelo->id }}" {{ $selected == $modelo->id ? 'selected' : '' }}>
                                {{ $modelo->nombre }}</option>
                        @endforeach
                    @endif
                </x-adminlte-select>
            @elseif (count($modelos) > 0 && $tipoMarca != null && $tipoMarca != "Seleccione una opción...")
            @elseif (count($modelos) == 0 && $tipoMarca != null && $tipoMarca == "Seleccione una opción...")
            @else
            @endif
        </div>
        <div wire:ignore>
            {{-- Ubicación --}}
            <x-adminlte-select id="area_id" name="area_id" label="Ubicacion(*):" label-class="text" igroup-size="sm"
                data-placeholder="Seleccione una opción..." required>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                </x-slot>
                <option>Seleccione una opción...</option>
                @php $selected = old('area_id', ($edit ?  $activo->area_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}" {{ $selected == $area->id ? 'selected' : '' }}>
                        {{ $area->nombre }}</option>
                @endforeach
            </x-adminlte-select>
        </div>
        <div wire:ignore>
            {{-- Fecha Adquisición --}}
            <x-form.input-date-activo label="Fecha de Adquisición(*):" id="fecha_adquisicion"
                name="fecha_adquisicion"
                value="{{ old('fecha_adquisicion', $edit ? \Carbon\Carbon::parse($activo->fecha_adquisicion)->format('d/m/Y H:m') : '') }}"
                required />
        </div>
        <div wire:ignore>
            {{-- Valor Inicial --}}
                <x-form.input-money id="valor" name="valor" label="Valor Inicial(*):" placeholder="" igroup-size="sm"
                        value="{{ old('valor', $edit ? $activo->valor : '') }}" required />
     
        </div>
            {{-- Stock --}}
                <x-form.input-number wire:ignore id="stock" name="stock" label="Cantidad(*):"
                    value="{{ old('stock', $edit ? $activo->stock : '') }}" required />
        <div wire:ignore>
            {{-- Estado --}}
                <x-adminlte-select name="estado_id" label="Estado(*):" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción..." required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="far fa-star"></i>
                        </div>
                    </x-slot>
                    <option>Seleccione una opción...</option>
                    @php $selected = old('estado_id', ($edit ?  $activo->estado_id : '')) @endphp
                    <option disabled {{ empty($selected) ? '' : '' }}></option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ $selected == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}</option>
                    @endforeach
                </x-adminlte-select>
        </div>
        <div wire:ignore>
            {{-- Descripción --}}
            <br>
            <div class="container-fluid">
                <div class="row {{-- justify-content-center --}}">
                    <div class="card card-secondary card-outline col-md-12">
                        <div class="card-header">
                            <h6 class="card-title"><strong># Descripción:</strong></h6>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="text-justify">
                                <label for="descripcion" class="form-label"></label>
                                <textarea id="descripcion" name="descripcion" class="form-control w-full" rows="6"
                                    placeholder="Ingrese una descripción detallada del bien...">{{ old('descripcion', $edit ? $activo->descripcion : '') }}</textarea>
                                <x-jet-input-error for="descripcion" class="text-danger py-3" />
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

    @elseif ($accion = 'Show')
        {{-- Nombre --}}
        <div class="row">
            <x-form.input name="nombre" label="Nombre(*):" placeholder="Ingrese un nombre" igroup-size="sm"
                value="{{ old('nombre', $edit ? $activo->nombre : '') }}" readonly />
        </div>
        {{-- Tipo --}}
        <x-adminlte-select2 id="tipo_id" name="tipo_id" label="Tipo(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción..." required class="col-12" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="far fa-clone"></i>
                </div>
            </x-slot>
            <option>Seleccione una opción...</option>
            @php $selected = old('tipo_id', ($edit ?  $activo->tipo_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            @foreach ($tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ $selected == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}</option>
            @endforeach
        </x-adminlte-select2>
        {{-- Categoría --}}
        <x-adminlte-select2 id="categoria_id" name="categoria_id" label="Categoria(*):" label-class="text"
            igroup-size="sm" data-placeholder="Seleccione una opción..." required class="col-12" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-list-ul"></i>
                </div>
            </x-slot>
            <option>Seleccione una opción...</option>
            @php $selected = old('categoria_id', ($edit ?  $activo->categoria->id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            <option value="{{ $activo->categoria->id }}" {{ $selected == $activo->categoria->id ? 'selected' : '' }}>
                {{ $activo->categoria->nombre }}</option>
        </x-adminlte-select2>
        {{-- Amortización --}}
        <div>
            <div class="row col-3 float-right">
                <x-form.input name="amortizacion" label="Amortización %:" placeholder=""
                    value="{{ old('amortizacion ', $activo->categoria->amortizacion) }}" class="input-sm" readonly />
            </div>
            <div class="row col-3 float-right">
                <x-form.input name="vida_util" label="Años Vida Útil:" placeholder=""
                    value="{{ old('vida_util', $activo->categoria->vida_util) }}" class="input-sm" readonly />
            </div>
            <div class="row col-3 float-right">
                <x-form.input name="cod_prosupuesto" label="Código Presupuesto:" placeholder=""
                    value="{{ old('cod_prosupuesto', $activo->categoria->cod_prosupuesto) }}" class="col-6"
                    readonly />
            </div>
            <br><br><br>
        </div>
        {{-- Marca --}}
        <x-adminlte-select2 id="marca_id" name="marca_id" label="Marca(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción..." readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="far fa-registered"></i>
                </div>
            </x-slot>
            <option>Seleccione una opción...</option>
            @php $selected = old('marca_id', ($edit ?  $activo->marca_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" {{ $selected == $marca->id ? 'selected' : '' }}>
                    {{ $marca->nombre }}</option>
            @endforeach
        </x-adminlte-select2>
        {{-- Modelo --}}
        <x-adminlte-select2 name="modelo_id" label="Modelo(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción..." readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-layer-group"></i>
                </div>
            </x-slot>
            {{--  <option>Seleccione una opción...</option> --}}
            @php $selected = old('modelo_id', ($edit ?  $activo->modelo->id: '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            <option value="{{ $activo->modelo->id }}" {{ $selected == $activo->modelo->id ? 'selected' : '' }}>
                {{ $activo->modelo->nombre }}</option>
        </x-adminlte-select2>
        {{-- @if (isset($activo->personas[0]))
                        <x-adminlte-select2 wire:model="persona" name="persona_id" label="Proveedor(*):" label-class="text"
                            igroup-size="sm" data-placeholder="Seleccione una opción..." readonly>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-server"></i>
                                </div>
                            </x-slot>
                            @php $selected = old('persona_id', ($edit ? $activo->personas[0]->id : '')) @endphp
                            <option disabled {{ empty($selected) ? '' : '' }}></option>
                            @foreach ($activo->personas as $persona)
                                <option value="{{ $persona->id }}" {{ $selected == $persona->id ? 'selected' : '' }}>
                                    {{ $persona->nombre }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    @endif --}}
        {{-- <div wire:ignore> --}}
        {{-- Ubicación --}}
        <x-adminlte-select2 name="area_id" label="Ubicacion(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción..." readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
            </x-slot>
            <option>Seleccione una opción...</option>
            @php $selected = old('area_id', ($edit ?  $activo->area_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}" {{ $selected == $area->id ? 'selected' : '' }}>
                    {{ $area->nombre }}</option>
            @endforeach
        </x-adminlte-select2>
        {{-- Fecha Adquisición --}}
        <div class="row">
            <x-form.input name="fecha_adquisicion" label="Fecha de Adquisición(*):" placeholder="" igroup-size="sm"
                value="{{ old('nombre', $edit ? \Carbon\Carbon::parse($activo->fecha_adquisicion)->format('d/m/Y H:m') : '') }}"
                onchange="obtenerFecha(this)" readonly />
        </div>
        {{-- Valor Inicial --}}
        <x-form.input-money name="valor" label="Valor Inicial(*):"
            value="{{ old('valor', $edit ? $activo->valor : '') }}" readonly />
        {{-- Stock --}}
        <x-form.input-number name="stock" label="Stock(*):"
            value="{{ old('valor', $edit ? $activo->stock : '') }}" readonly />
        {{-- Estado --}}
        <x-adminlte-select2 name="estado_id" label="Estado(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción..." readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="far fa-star"></i>
                </div>
            </x-slot>
            <option>Seleccione una opción...</option>
            @php $selected = old('estado_id', ($edit ?  $activo->estado_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            @foreach ($estados as $estado)
                <option value="{{ $estado->id }}" {{ $selected == $estado->id ? 'selected' : '' }}>
                    {{ $estado->nombre }}</option>
            @endforeach
        </x-adminlte-select2>
        {{-- </div> --}}
        {{-- Descripción --}}
        {{--   <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="editor" name="descripcion" class="form-control w-full" rows="6"
                placeholder="Ingrese una descripción detallada del bien..." readonly>{{ old('descripcion', $edit ? $activo->descripcion : '') }}</textarea>
            <x-jet-input-error for="descripcion" class="text-danger" /> --}}
        <br>
        <div class="container-fluid">
            <div class="row {{-- justify-content-center --}}">
                <div class="card card-secondary card-outline col-md-12">
                    <div class="card-header">
                        <h6 class="card-title"><strong># Descripción:</strong></h6>
                        <div class="card-tools">
                            <!-- Collapse Button -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p class="text-justify">{!! $activo->descripcion !!}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    @endif

</div>

@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#descripcion'), {
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    uploadUrl: "{{ route('image.upload') }}"
                }
            })
            .then(function(editor) {
                editor.model.document.on('change:data', () => {
                    @this.set('descripcion', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        document.addEventListener('livewire:load', function() {
            $('#tipo_id').select();
            $('#tipo_id').on('change', function() {
                @this.set('tipo', this.value)
            });
            $('#categoria_id').select();
            $('#categoria_id').on('change', function() {
                @this.set('categoria', this.value)
            });
            $('#marca_id').select();
            $('#marca_id').on('change', function() {
                @this.set('marca', this.value)
            });
        });
    </script>
@endpush('js')
