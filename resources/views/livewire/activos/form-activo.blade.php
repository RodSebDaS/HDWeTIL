<div>
    <div>
        @php $edit=isset($activo) @endphp
        @csrf
        @if (!isset($accion))
            {{-- Nombre --}}
            <div class="row">
                <x-form.input name="nombre" label="Nombre(*):" placeholder="Ingrese un nombre" igroup-size="sm"
                    value="{{ old('nombre', $edit ? $activo->nombre : '') }}" required />
            </div>
            {{-- Fecha Adquisición --}}
            <x-form.input-date-activo label="Fecha de Adquisición(*):" id="fecha_adquisicion" name="fecha_adquisicion"
                value="{{ old('fecha_adquisicion', $edit ? \Carbon\Carbon::parse($activo->fecha_adquisicion)->format('d/m/Y') : '') }}"
                required />
            {{-- Valor Inicial --}}
            <x-adminlte-input id="valor" name="valor" label="Valor Inicial(*):" placeholder="Ingrese un valor..."
                label-class="text" igroup-size="sm">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i>$</i>
                    </div>
                </x-slot>
                <x-form.input id="valor" name="valor" label="" placeholder="" igroup-size="sm"
                    value="{{ old('valor', $edit ? $activo->valor : '') }}" required />
                <x-slot name="appendSlot">
                    <div class="input-group-text">
                        <i>,00</i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            {{-- Categoría --}}
            <x-adminlte-select2 wire:model="categoria" name="categoria_id" label="Categoria(*):" label-class="text"
                igroup-size="sm" data-placeholder="Seleccione una opción..." required class="col-12">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="far fa-clone"></i>
                    </div>
                </x-slot>
                <option >Seleccione una opción...</option>
                @php $selected = old('categoria_id', ($edit ?  $activo->categoria_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}</option>
                @endforeach
            </x-adminlte-select2>
            <div>
                @foreach ($category as $cat)
                    <div class="row col-3 float-right">
                        <x-form.input name="amortizacion" label="Amortización %:" placeholder=""
                            value="{{ old('$cat->amortizacion ', $cat->amortizacion) }}" class="input-sm"
                            readonly />
                    </div>
                    <div class="row col-3 float-right">
                        <x-form.input name="vida_util" label="Años Vida Útil:" placeholder=""
                            value="{{ old('$cat->vida_util', $cat->vida_util) }}" class="input-sm" readonly />
                    </div>
                    <div class="row col-3 float-right">
                        <x-form.input name="cod_prosupuesto" label="Código Presupuesto:" placeholder=""
                            value="{{ old('$cat->cod_prosupuesto', $cat->cod_prosupuesto) }}" class="col-6"
                            readonly />
                    </div>
                    <br><br><br>
                @endforeach
            </div>
            <div>
                {{-- Marca --}}
                <x-adminlte-select2 wire:model="marca" id="marca_id" name="marca_id" label="Marca(*):"
                    label-class="text" igroup-size="sm" data-placeholder="Seleccione una opción..." required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-exclamation-triangle"></i>
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
            </div>
            {{-- Modelo --}}
            @if (!is_null($modelos))
                <x-adminlte-select2 wire:model="modelo" name="modelo_id" label="Modelo(*):" label-class="text"
                    igroup-size="sm" data-placeholder="Seleccione una opción..." required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-server"></i>
                        </div>
                    </x-slot>
                    <option>Seleccione una opción...</option>
                    @php $selected = old('modelo_id', ($edit ?  $activo->modelo_id : '')) @endphp
                   {{--  <option disabled {{ empty($selected) ? '' : '' }}></option> --}}
                    @foreach ($modelos as $modelo)
                        <option value="{{ $modelo->id }}" {{ $selected == $modelo->id ? 'selected' : '' }}>
                            {{ $modelo->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
            @endif

            <x-adminlte-select2 wire:model="persona" name="persona_id" label="Proveedor(*):" label-class="text"
                igroup-size="sm" data-placeholder="Seleccione una opción..." required>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-server"></i>
                    </div>
                </x-slot>
                {{--  <option>Seleccione una opción...</option> --}}
                {{-- <option disabled {{ empty($selected) ? '' : '' }}></option> --}}
                @foreach ($personas as $persona)
                    @php $selected = old('persona_id', ($edit ?  $persona->id : '')) @endphp
                    <option value="{{ $persona->id }}" {{ $selected == $persona->id ? 'selected' : '' }}>
                        {{ $persona->nombre }}</option>
                @endforeach
            </x-adminlte-select2>
            <div wire:ignore>
                {{-- Estado --}}
                <x-adminlte-select2 name="estado_id" label="Estado(*):" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción..." required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-desktop"></i>
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
                {{-- Ubicación --}}
                <x-adminlte-select2 name="area_id" label="Ubicacion(*):" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción..." required>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-desktop"></i>
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
            </div>
            {{-- Stock --}}
            <x-form.input-number name="stock" label="Stock(*):"
                value="{{ old('valor', $edit ? $activo->stock : '') }}" required />
            {{-- Descripción --}}
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="editor" name="descripcion" class="form-control w-full" rows="6"
                placeholder="Ingrese una descripción detallada del bien...">{{ old('descripcion', $edit ? $activo->descripcion : '') }}</textarea>
            <x-jet-input-error for="descripcion" class="text-danger" />
        @elseif ($accion = 'Show')
            {{-- Nombre --}}
            <div class="row">
                <x-form.input name="nombre" label="Nombre(*):" placeholder="Ingrese un nombre" igroup-size="sm"
                    value="{{ old('nombre', $edit ? $activo->nombre : '') }}" readonly />
            </div>
            {{-- Fecha Adquisición --}}
            <div class="row">
                <x-form.input name="fecha_adquisicion" label="Fecha de Adquisición(*):" placeholder=""
                    igroup-size="sm"
                    value="{{ old('nombre', $edit ? \Carbon\Carbon::parse($activo->fecha_adquisicion)->format('d/m/Y') : '') }}"
                    onchange="obtenerFecha(this)" readonly />
            </div>
            {{-- Valor Inicial --}}
            <x-form.input-money name="valor" label="Valor Inicial(*):"
                value="{{ old('valor', $edit ? $activo->valor : '') }}" readonly />
            {{-- Categoría --}}
            <x-adminlte-select2 name="categoria_id" label="Categoria(*):" label-class="text" igroup-size="sm"
                data-placeholder="Seleccione una opción..." required class="col-12" readonly>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="far fa-clone"></i>
                    </div>
                </x-slot>
                @php $selected = old('categoria_id', ($edit ?  $activo->categoria_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                <option disabled>Seleccione una opción...</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $selected == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}</option>
                @endforeach
            </x-adminlte-select2>
            <div>
                <div class="row col-3 float-right">
                    <x-form.input name="amortizacion" label="Amortización %:" placeholder=""
                        value="{{ $activo->categoria->amortizacion }}" class="input-sm" readonly />
                </div>
                <div class="row col-3 float-right">
                    <x-form.input name="vida_util" label="Años Vida Útil:" placeholder=""
                        value="{{ $activo->categoria->vida_util }}" class="input-sm" readonly />
                </div>
                <div class="row col-3 float-right">
                    <x-form.input name="cod_prosupuesto" label="Código Presupuesto:" placeholder=""
                        value="{{ $activo->categoria->cod_prosupuesto }}" class="col-6" readonly />
                </div>
                <br><br><br>
            </div>
            <div>
                {{-- Marca --}}
                <x-adminlte-select2 id="marca_id" name="marca_id" label="Marca(*):" label-class="text"
                    igroup-size="sm" data-placeholder="Seleccione una opción..." readonly>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-exclamation-triangle"></i>
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
            </div>
            {{-- Modelo --}}
            <x-adminlte-select2 name="modelo_id" label="Modelo(*):" label-class="text" igroup-size="sm"
                data-placeholder="Seleccione una opción..." readonly>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-server"></i>
                    </div>
                </x-slot>
                {{--  <option>Seleccione una opción...</option> --}}
                @php $selected = old('modelo_id', ($edit ?  $activo->modelo->id: '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                <option value="{{ $activo->modelo->id }}" {{ $selected == $activo->modelo->id ? 'selected' : '' }}>
                    {{ $activo->modelo->nombre }}</option>
            </x-adminlte-select2>
            @if (isset($activo->personas[0]))
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
            @endif
            <div wire:ignore>
                {{-- Estado --}}
                <x-adminlte-select2 name="estado_id" label="Estado(*):" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción..." readonly>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-desktop"></i>
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
                {{-- Ubicación --}}
                <x-adminlte-select2 name="area_id" label="Ubicacion(*):" label-class="text" igroup-size="sm"
                    data-placeholder="Seleccione una opción..." readonly>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-desktop"></i>
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
            </div>
            {{-- Stock --}}
            <x-form.input-number name="stock" label="Stock(*):"
                value="{{ old('valor', $edit ? $activo->stock : '') }}" readonly />
            {{-- Descripción --}}
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="editor" name="descripcion" class="form-control w-full" rows="6"
                placeholder="Ingrese una descripción detallada del bien..." readonly>{{ old('descripcion', $edit ? $activo->descripcion : '') }}</textarea>
            <x-jet-input-error for="descripcion" class="text-danger" />
        @endif
    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('#categoria_id').select2();
            $('#categoria_id').on('change', function() {
                @this.set('categoria', this.value)
            });
            $('#marca_id').select2();
            $('#marca_id').on('change', function() {
                @this.set('marca', this.value)
            });
        })
    </script>
</div>
