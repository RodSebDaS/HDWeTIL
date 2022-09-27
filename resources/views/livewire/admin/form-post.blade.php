<div>
    @php $edit = isset($post) @endphp
    @csrf
    <fieldset>
        <!-- Form Name -->
        <legend></legend>
        {{-- Título --}}
        <div class="row">
            <x-adminlte-input name="titulo" label="Título(*):" placeholder="Ingrese un título" fgroup-class="col-md-12"
                value="{{ old('titulo', $edit ? $post->titulo : '') }}" required />
        </div>
        @if ($edit == '')
            {{-- Descripción --}}
            <x-adminlte-card title="Detalle" theme="primary" theme-mode="sm" icon="" collapsible>
                @livewire('admin.editor')
                {{-- Fecha SLA --}}
                <x-form.input-date value="{{ old('sla', $edit ? $post->sla : '') }}" />
            </x-adminlte-card>
        @else
            {{-- Descripción --}}
            <x-adminlte-card title="Detalle" theme="primary" theme-mode="sm" icon="" collapsible="collapsed">
                @livewire('admin.editor', ['post' => $post])
                {{-- Fecha SLA --}}
                <x-form.input-date value="{{ old('sla', $edit ? $post->sla : '') }}" />
            </x-adminlte-card>

            {{-- Comentarios --}}
            @livewire('admin.comentarios', ['post' => $post])
            {{-- <x-comentarios/> --}}
        @endif
    </fieldset>
</div>
