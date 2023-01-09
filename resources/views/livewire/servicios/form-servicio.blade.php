<div>
    @php $edit=isset($servicio) @endphp
    @csrf
    @if (!isset($accion))
        {{-- Nombre --}}
        <div class="row">
            <x-form.input name="nombre" label="Nombre(*):" placeholder="Ingrese un nombre" igroup-size="sm"
                value="{{ old('nombre', $edit ? $servicio->nombre : '') }}" required />
        </div>
        {{-- Proveedor --}}
        {{--  <x-adminlte-select2 wire:model="provedor" name="proveedor_id" label="Proveedor(*):" label-class="text"
            igroup-size="sm" data-placeholder="Seleccione una opción..." required class="col-12">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="far fa-clone"></i>
                </div>
            </x-slot>
            @php $selected = old('proveedor_id', ($edit ?  $servicio->proveedor_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            <option disabled>Seleccione una opción...</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}" {{ $selected == $proveedor->id ? 'selected' : '' }}>
                    {{ $proveedor->nombre }}</option>
            @endforeach
            </x-adminlte-select2> --}}
        {{-- Valor --}}
        <x-adminlte-input id="valor" name="valor" label="Valor(*):" placeholder="Ingrese un valor..."
            label-class="text" value="{{ old('valor', $edit ? $servicio->valor : '') }}" type="number" Step=".01"
            required>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i>$</i>
                </div>
            </x-slot>
            <x-slot name="appendSlot">
                <div class="input-group-text">
                    <i>,00</i>
                </div>
            </x-slot>
        </x-adminlte-input>
        {{-- Descripción --}}
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea id="editor" name="descripcion" class="form-control w-full" rows="6"
            placeholder="Ingrese una descripción detallada del bien...">{{ old('descripcion', $edit ? $servicio->descripcion : '') }}</textarea>
        <x-jet-input-error for="descripcion" class="text-danger" />
        {{-- Calificación --}}
                <div class="mt-3">
                    <hr>
                    <label>Calificación:</label>
                    @if ($puntaje->sum('calificacion') !== 0 && $puntaje->sum('calificacion') !== null)
                        <p>
                            @if (round($puntaje->sum('calificacion') / $puntaje->count()) == 5)
                                <p class="clasificacion fa-2x">
                                        <input id="radio1" type="radio" name="calificacion" value="5" checked disabled>
                                        <label for="radio1">★</label>
                                        <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                                        <label for="radio2">★</label>
                                        <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                                        <label for="radio3">★</label>
                                        <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                                        <label for="radio4">★</label>
                                        <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                                        <label for="radio5">★</label>
                                </p>   
                            @elseif (round($puntaje->sum('calificacion') / $puntaje->count()) == 4)
                                <p class="clasificacion fa-2x">
                                        <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                                        <label for="radio1">★</label>
                                        <input id="radio2" type="radio" name="calificacion" value="4" checked disabled>
                                        <label for="radio2">★</label>
                                        <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                                        <label for="radio3">★</label>
                                        <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                                        <label for="radio4">★</label>
                                        <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                                        <label for="radio5">★</label>
                                </p>
                            @elseif (round($puntaje->sum('calificacion') / $puntaje->count()) == 3)
                                <p class="clasificacion fa-2x">
                                        <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                                        <label for="radio1">★</label>
                                        <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                                        <label for="radio2">★</label>
                                        <input id="radio3" type="radio" name="calificacion" value="3" checked disabled>
                                        <label for="radio3">★</label>
                                        <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                                        <label for="radio4">★</label>
                                        <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                                        <label for="radio5">★</label>
                                </p>
                            @elseif (round($puntaje->sum('calificacion') / $puntaje->count()) == 2)
                                <p class="clasificacion fa-2x">
                                        <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                                        <label for="radio1">★</label>
                                        <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                                        <label for="radio2">★</label>
                                        <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                                        <label for="radio3">★</label>
                                        <input id="radio4" type="radio" name="calificacion" value="2" checked disabled>
                                        <label for="radio4">★</label>
                                        <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                                        <label for="radio5">★</label>
                                </p>    
                            @elseif (round($puntaje->sum('calificacion') / $puntaje->count()) == 1)
                                <p class="clasificacion fa-2x">
                                        <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                                        <label for="radio1">★</label>
                                        <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                                        <label for="radio2">★</label>
                                        <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                                        <label for="radio3">★</label>
                                        <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                                        <label for="radio4">★</label>
                                        <input id="radio5" type="radio" name="calificacion" value="1" checked disabled>
                                        <label for="radio5">★</label>
                                </p> 
                            @endif
                        </p>
                        <label>Votos: {{ $puntaje->count() }}</label>&nbsp;<label>Puntaje: {{ round($puntaje->sum('calificacion') / $puntaje->count()) }}</label>
                    <hr>
                        {{-- Estado --}}
                        <x-adminlte-select2 name="estado_id" label="Estado(*):" label-class="text" igroup-size="sm"
                        data-placeholder="Seleccione una opción..." readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-desktop"></i>
                            </div>
                        </x-slot>
                        {{-- <option>Seleccione una opción...</option> --}}
                        @php $selected = (round($puntaje->sum('calificacion') / $puntaje->count())+8) @endphp
                        <option disabled {{ empty($selected) ? '' : '' }}></option>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}" {{ $selected == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre }}</option>
                        @endforeach
                    </x-adminlte-select2>
                    
                    @else
                        <p class="clasificacion fa-2x">
                            <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                            <label for="radio1">★</label>
                            <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                            <label for="radio2">★</label>
                            <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                            <label for="radio3">★</label>
                            <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                            <label for="radio4">★</label>
                            <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                            <label for="radio5">★</label>
                        </p>    
                        <label>Votos: {{ 0 }}</label>&nbsp;<label>Puntaje: {{ 0 }}</label>
                    <hr>
                    @endif
            </div>
    @elseif($accion = 'Show')
        {{-- Nombre --}}
        <div class="row">
            <x-form.input name="nombre" label="Nombre(*):" placeholder="Ingrese un nombre" igroup-size="sm"
                value="{{ old('nombre', $edit ? $servicio->nombre : '') }}" readonly />
        </div>
        {{-- Valor --}}
        <x-adminlte-input id="valor" name="valor" label="Valor(*):" placeholder="Ingrese un valor..."
            label-class="text" value="{{ old('valor', $edit ? $servicio->valor : '') }}" type="number" Step=".01"
            readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i>$</i>
                </div>
            </x-slot>
            <x-slot name="appendSlot">
                <div class="input-group-text">
                    <i>,00</i>
                </div>
            </x-slot>
        </x-adminlte-input>
        {{-- Descripción --}}
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea id="editor" name="descripcion" class="form-control w-full" rows="6"
            placeholder="Ingrese una descripción detallada del bien..." readonly>{{ old('descripcion', $servicio->descripcion) }}</textarea>
        <x-jet-input-error for="descripcion" class="text-danger" />
         {{-- Calificación --}}
         <div class="mt-3">
            <hr>
            <label>Calificación:</label>
            @if ($puntaje->sum('calificacion') !== 0 && $puntaje->sum('calificacion') !== null)
                <p>
                    @if (round($puntaje->sum('calificacion') / $puntaje->count()) == 5)
                        <p class="clasificacion fa-2x">
                                <input id="radio1" type="radio" name="calificacion" value="5" checked disabled>
                                <label for="radio1">★</label>
                                <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                                <label for="radio2">★</label>
                                <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                                <label for="radio3">★</label>
                                <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                                <label for="radio4">★</label>
                                <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                                <label for="radio5">★</label>
                        </p>   
                    @elseif (round($puntaje->sum('calificacion') / $puntaje->count()) == 4)
                        <p class="clasificacion fa-2x">
                                <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                                <label for="radio1">★</label>
                                <input id="radio2" type="radio" name="calificacion" value="4" checked disabled>
                                <label for="radio2">★</label>
                                <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                                <label for="radio3">★</label>
                                <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                                <label for="radio4">★</label>
                                <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                                <label for="radio5">★</label>
                        </p>
                    @elseif (round($puntaje->sum('calificacion') / $puntaje->count()) == 3)
                        <p class="clasificacion fa-2x">
                                <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                                <label for="radio1">★</label>
                                <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                                <label for="radio2">★</label>
                                <input id="radio3" type="radio" name="calificacion" value="3" checked disabled>
                                <label for="radio3">★</label>
                                <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                                <label for="radio4">★</label>
                                <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                                <label for="radio5">★</label>
                        </p>
                    @elseif (round($puntaje->sum('calificacion') / $puntaje->count()) == 2)
                        <p class="clasificacion fa-2x">
                                <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                                <label for="radio1">★</label>
                                <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                                <label for="radio2">★</label>
                                <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                                <label for="radio3">★</label>
                                <input id="radio4" type="radio" name="calificacion" value="2" checked disabled>
                                <label for="radio4">★</label>
                                <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                                <label for="radio5">★</label>
                        </p>    
                    @elseif (round($puntaje->sum('calificacion') / $puntaje->count()) == 1)
                        <p class="clasificacion fa-2x">
                                <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                                <label for="radio1">★</label>
                                <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                                <label for="radio2">★</label>
                                <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                                <label for="radio3">★</label>
                                <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                                <label for="radio4">★</label>
                                <input id="radio5" type="radio" name="calificacion" value="1" checked disabled>
                                <label for="radio5">★</label>
                        </p> 
                    @endif
                </p>
                <label>Votos: {{ $puntaje->count() }}</label>&nbsp;<label>Puntaje: {{ round($puntaje->sum('calificacion') / $puntajes_servicio->count()) }}</label>
                <hr>
                  {{-- Estado --}}
                  <x-adminlte-select2 name="estado_id" label="Estado(*):" label-class="text" igroup-size="sm"
                  data-placeholder="Seleccione una opción..." readonly>
                  <x-slot name="prependSlot">
                      <div class="input-group-text bg-gradient-info">
                          <i class="fas fa-desktop"></i>
                      </div>
                  </x-slot>
                  {{-- <option>Seleccione una opción...</option> --}}
                  @php $selected = (round($puntaje->sum('calificacion') / $puntaje->count())+8) @endphp
                  <option disabled {{ empty($selected) ? '' : '' }}></option>
                  @foreach ($estados as $estado)
                      <option value="{{ $estado->id }}" {{ $selected == $estado->id ? 'selected' : '' }}>
                          {{ $estado->nombre }}</option>
                  @endforeach
              </x-adminlte-select2>
            @else
                <p class="clasificacion fa-2x" >
                    <input id="radio1" type="radio" name="calificacion" value="5" disabled>
                    <label for="radio1">★</label>
                    <input id="radio2" type="radio" name="calificacion" value="4" disabled>
                    <label for="radio2">★</label>
                    <input id="radio3" type="radio" name="calificacion" value="3" disabled>
                    <label for="radio3">★</label>
                    <input id="radio4" type="radio" name="calificacion" value="2" disabled>
                    <label for="radio4">★</label>
                    <input id="radio5" type="radio" name="calificacion" value="1" disabled>
                    <label for="radio5">★</label>
                </p>    
                <label>Votos: {{ 0 }}</label>&nbsp;<label>Puntaje: {{ 0 }}</label>
                <hr>
            @endif
    </div>
    @endif
    <style>
        #form {
        width: 250px;
        margin: 0 auto;
        height:50px;
        }

        #form p {
        text-align: center;
        }

        #form label {
        font-size: 50px;
        }

        input[type="radio"] {
        display: none;
        }

        label {
        color: grey;
        }

        .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
        }

        label:hover,
        label:hover~label {
        color: orange;
        }

        input[type="radio"]:checked~label {
        color: orange;
        }
    </style>
</div>

