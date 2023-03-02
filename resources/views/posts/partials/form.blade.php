@php $edit = isset($post) @endphp
@csrf
<div>
    <fieldset>
        <!-- Form Name -->
        <legend></legend>

        {{-- Título --}}
        <div class="row">
            <x-adminlte-input name="titulo" label="Título(*):" placeholder="Ingrese un título" fgroup-class="col-md-12"
                value="{{ old('titulo', $edit ? $post->titulo : '') }}" />
        </div>

        {{-- Tipo --}}
            {{-- <x-adminlte-select2 name="tipo" label="Tipo(*):" label-class="text" igroup-size="sm"
            data-placeholder="Seleccione una opción...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="far fa-clone"></i>
                </div>
            </x-slot>
            @php $selected = old('tipo', ($edit ?  $post->prioridad_id : '')) @endphp
            <option disabled {{ empty($selected) ? '' : '' }}></option>
            <option></option>
            @foreach ($tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ $selected == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}</option>
            @endforeach
            </x-adminlte-select2> --}}

        <x-adminlte-card title="Detalle" theme="primary" theme-mode="sm" icon="" collapsible="collapsed">

            {{-- Propiedad --}}
            <x-adminlte-select2 name="prioridad_id" label="Prioridad(*):" label-class="text" igroup-size="sm"
                data-placeholder="Seleccione una opción...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </x-slot>
                @php $selected = old('prioridad_id', ($edit ?  $post->prioridad_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                {{-- <option></option> --}}
                @foreach ($prioridades as $prioridad)
                    <option value="{{ $prioridad->id }}" {{ $selected == $prioridad->id ? 'selected' : '' }}>
                        {{ $prioridad->nombre }}</option>
                @endforeach
            </x-adminlte-select2>

            {{-- Servicio --}}
            <x-adminlte-select2 name="servicio_id" label="Servicio(*):" label-class="text" igroup-size="sm"
                data-placeholder="Seleccione una opción...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-server"></i>
                    </div>
                </x-slot>
                <option></option>
                @php $selected = old('servicio_id', ($edit ?  $post->servicio_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($servicios as $servicio)
                    <option value="{{ $servicio->id }}" {{ $selected == $servicio->id ? 'selected' : '' }}>
                        {{ $servicio->nombre }}</option>
                @endforeach
            </x-adminlte-select2>

            {{-- Activo --}}
            <x-adminlte-select2 name="activo_id" label="Activo(*):" label-class="text" igroup-size="sm"
                data-placeholder="Seleccione una opción...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-desktop"></i>
                    </div>
                </x-slot>
                <option></option>
                @php $selected = old('activo_id', ($edit ?  $post->activo_id : '')) @endphp
                <option disabled {{ empty($selected) ? '' : '' }}></option>
                @foreach ($activos as $activo)
                    <option value="{{ $activo->id }}" {{ $selected == $activo->id ? 'selected' : '' }}>
                        {{ $activo->nombre }}</option>
                @endforeach
            </x-adminlte-select2>

            {{-- Fecha SLA --}}
            @php
                $config = ['format' => 'DD/MM/YY HH:mm'];
            @endphp
            <x-adminlte-input-date name="sla" placeholder="Eliga una fecha..." igroup-size="sm"
                label="Fecha de solución esperada:" label-class="text" :config="$config"
                value="{{ old('sla', $edit ? $post->sla : '') }}">
                <x-slot name="prependSlot">
                    <x-adminlte-button theme="outline-info" icon="far fa-lg fa-calendar-alt" title="Fecha/Hora" />
                </x-slot>
            </x-adminlte-input-date>
        </x-adminlte-card>

        {{-- Descripción --}}
        <div class="mb-4" wire:ignore>
            <label for="editor" class="form-label">Descripción(*):</label>
            <textarea wire:model="content" class="form-control w-full" id="editor" rows="6"></textarea>
        </div>

        @if ($edit)
            {{-- Comentarios --}}
            @livewire('admin.comentarios', ['post' => $post])
            {{-- <x-comentarios/> --}}
        @endif

    </fieldset>

    @push('js')
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    simpleUpload: {
                        // The URL that the images are uploaded to.
                        uploadUrl: "{{ route('image.upload') }}",
                    }
                })
                .then(function(editor) {
                    editor.model.document.on('change:data', () => {
                        @this.set('content', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush('js')
</div>
