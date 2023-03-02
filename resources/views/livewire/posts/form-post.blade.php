@php $edit=isset($post) @endphp
{{--<div class="card">--}}
   
    @csrf
  
    <fieldset id="fieldset">

        @error('respuesta')
        <div class="alert alert-danger">{{ $message }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        @enderror
        
        @if ($accion == 'Create')
            {{-- Título --}}
            <label for="titulo"></label>  
            @error('titulo')
                {{--<div class="alert alert-warning">
                    {{ $message }} 
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>--}}
            @enderror
            <div class="row">
                <x-form.input wire:model="titulo" name="titulo" label="Título(*):" placeholder="Ingrese un título"
                    value="{{ old('titulo', $edit ? $post->titulo : '') }}" required />
            </div>
            {{-- Detalle --}}
            <x-adminlte-card title="Detalle" theme="primary" theme-mode="sm" icon="" collapsible>
                {{--  @livewire('posts.detalle') --}}
                @can('posts.edit')
                    @livewire('posts.detalle')
                @else
                    @livewire('posts.detalle-edit')
                @endcan
            </x-adminlte-card>
            {{-- Descripción --}}
            <x-adminlte-card title="Descripción" theme="primary" theme-mode="sm" icon="" collapsible>
                @livewire('components.editor', ['accion' => 'Create', 'name' => 'create'])
            </x-adminlte-card>
        @elseif($accion == 'Edit')
            <x-tab tab1LabelName="Datos" tab2LabelName="Acciones" tab3LabelName="">
                <slot name="datos">
                    {{-- Título --}}
                    <label for="titulo"></label>   
                    @error('titulo')
                    <div class="alert alert-warning">
                        @if ($post->flujovalor_id == 4) La solicitud con ese título ya ha sido resuelta!
                        
                            Puede dirigirse a: {!! link_to("home/posts/buscarRespuesta",'Preguntas Frecuentes') !!} y ver su solución. Muchas gracias!
                            <button type="button" class="close" data-dismiss="alert">&times;</button>  
                        @else
                            {{ $message }} Déjenos su consulta o comuníquese con nosotros, 
                            para saber el estado de la misma. Muchas gracias!
                            <button type="button" class="close" data-dismiss="alert">&times;</button> 
                        @endif
                    </div>
                    @enderror
                    <div class="row">
                        <x-form.input name="titulo" label="Título(*):" placeholder="Ingrese un título"
                            value="{{ old('titulo', $edit ? $post->titulo : '') }}" required />
                    </div>
                    {{-- Detalle --}}
                    <x-adminlte-card title="Detalle" theme="primary" theme-mode="sm" icon="" collapsible>
                        @can('posts.edit')
                            @livewire('posts.detalle', ['post' => $post])
                        @else
                            @livewire('posts.detalle-edit', ['post' => $post])
                        @endcan
                    </x-adminlte-card>
                    {{-- Descripción --}}
                    <x-adminlte-card title="Descripción" theme="primary" theme-mode="sm" icon=""
                        collapsible>
                        @livewire('components.editor', ['post' => $post, 'name' => 'edit'])
                    </x-adminlte-card>
                    {{-- Comentarios --}}
                    <form wire:submit.preventDefault() class="form-group"
                        action={{ route('comentarios.store') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-tools">
                            <span data-toggle="tooltip" title="Nuevo Mensaje" class="badge badge-light"></span>
                        </div>
                        <x-adminlte-card title="Comentarios" theme="primary" theme-mode="sm" icon="" collapsible>
                            <div>
                                @livewire('components.comentarios', ['post' => $post])
                                <div class="input-group">
                                    <input type="text" id="inputCom" name="mensaje" label="Comentario:"
                                        placeholder="Añadir comentario..." class="form-control">
                                    <input id="post_id" name="post_id" value="{{$post->id}}" hidden>
                                    <span class="input-group-append">
                                        <a href="#">
                                            <button type="success" class="btn btn-primary" icon="fas fa-plane">
                                                <span class="fas fa-paper-plane"></span>
                                            </button>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </x-adminlte-card>
                    </form>
                </slot>
                <x-slot name="respuesta">
                    <x-todolist :$post />
                    {{-- Respuesta --}}
                    <div class="mb-4">
                        <label for="editorlb" class="form-label text-primary">Respuesta(*):</label>
                        <textarea id="respuesta" name="respuesta" class="form-control w-full" rows="6"
                            placeholder="Ingrese una respuesta detallada para el asunto...">
                            {{ old('respuesta', $edit ? $post->respuesta : '') }}
                        </textarea>
                        <x-jet-input-error for="respuesta" class="text-danger"/>
                    </div>
                </x-slot>
            </x-tab>
        @elseif($accion == 'Show')
            {{-- Resumen --}}
            <div class=""> 
                <div class="card-body"> 
                <h5><strong>Solicitud Nro:</strong> {{ $post->id }}</h5>
                <li class="mt-3"><strong>Creado:</strong> {{ $post->created_at->format('d/m/Y - H:i') }} </li>
                <li><strong>Por:</strong> {{ $user_created_at->name }} </li>
                <li><strong>Email:</strong> {{ $user_created_at->email }} </li>
                <li><strong>Asunto:</strong> {{ $post->titulo }}</li>
                <li class="mt-3"><strong>Descripción:</strong><br><br><p class="text-justify">{!! $post->descripcion !!}</p></li>
                {{--<li>Sla: {{ $post->sla->format('d/m/Y - H:i') }}</li>--}}
                </div>
            </div>
            {{--<x-tab tab1LabelName="Datos" tab2LabelName="Acciones" tab3LabelName="" >
                <slot name="datos">
                    {{-- Título --}
                    <div class="row">
                        <x-form.input name="titulo" label="Título(*):" placeholder="Ingrese un título"
                            value="{{ old('titulo', $edit ? $post->titulo : '') }}" readonly />
                    </div>
                    {{-- Detalle --}
                    <x-adminlte-card title="Detalle" theme="primary" theme-mode="sm" icon="" collapsible
                        disabled>
                        @livewire('posts.detalle', ['post' => $post])
                    </x-adminlte-card>
                    {{-- Descripción --}
                    <x-adminlte-card title="Descripción" theme="primary" theme-mode="sm" icon="" collapsible
                        disabled>
                        @livewire('components.editor', ['post' => $post, 'name' => 'show'])
                        {{--  <div class="mb-4">
                        <label for="editorlb" class="form-label">Descripción(*):</label>
                        <textarea readonly disabled id="descripcion" name="descripcion" class="form-control w-full" rows="6"
                            placeholder="Ingrese una descripción detallada del asunto">
                                        {{ old('descripcion', $edit ? $post->descripcion : '') }}</textarea>
                        </div> --}
                    </x-adminlte-card>
                    {{-- Comentarios --}
                    <div class="card-tools">
                        <span data-toggle="tooltip" title="Nuevo Mensaje" class="badge badge-light"></span>
                    </div>
                    <x-adminlte-card  title="Comentarios" theme="primary" theme-mode="sm" icon="" collapsible>
                        <div>
                            @livewire('components.comentarios', ['post' => $post])
                            <form wire:submit.preventDefault() class="form-group"
                                action={{ route('comentarios.store') }} method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input type="text" id="inputCom" name="mensaje" label="Comentario:"
                                        placeholder="Añadir comentario..." class="form-control">
                                    <input id="post_id" name="post_id" value="{{$post->id}}" hidden>
                                    <span class="input-group-append">
                                        <a href="#">
                                            <button type="success" class="btn btn-primary" icon="fas fa-plane">
                                                <span class="fas fa-paper-plane"></span>
                                            </button>
                                        </a>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </x-adminlte-card>
                </slot>
                <x-slot name="respuesta">
                    <x-todolist :$post />
                    {{-- Respuesta --}}
                    {{--<x-adminlte-card title="Respuesta" theme="primary" theme-mode="sm" icon="" collapsible
                        disabled>
                        <div class="mb-4">
                            <label for="editorlb" class="form-label text-primary">Respuesta(*):</label>
                            <textarea id="respuesta" name="respuesta" class="form-control w-full" rows="6"
                                placeholder="Ingrese una respuesta detallada para el asunto...">
                            {{ old('respuesta', $edit ? $post->respuesta : '') }}
                        </textarea>
                            <x-jet-input-error for="respuesta" class="text-danger" />
                        </div>
                    </x-adminlte-card>--}
                    <x-adminlte-card name="respuesta" title="Respuesta" theme="light" theme-mode="sm" icon=""
                    collapsible="collapsed">
                        {!! old('respuesta', $edit ? $post->respuesta : '') !!} 
                    </x-adminlte-card>
                   {{--@livewire('posts.modal-accion', ['post' => $post])--}              
                </x-slot>
            </x-tab>--}}
        @elseif($accion == 'Atendida')
            <x-tab tab1LabelName="Datos" tab2LabelName="Acciones" tab3LabelName="">
                <slot name="datos">
                    {{-- Título --}}
                    <div class="row">
                        <x-form.input name="titulo" label="Título(*):" placeholder="Ingrese un título"
                            value="{{ old('titulo', $edit ? $post->titulo : '') }}" readonly />
                    </div>
                    {{-- Detalle --}}
                    <x-adminlte-card title="Detalle" theme="light" theme-mode="sm" icon="" collapsible>
                        @livewire('posts.detalle-show', ['post' => $post])
                    </x-adminlte-card>
                    {{-- Descripción --}}
                        {{--<x-adminlte-card title="Descripción" theme="light" theme-mode="sm" icon=""
                            collapsible="collapsed">
                            @livewire('components.editor', ['post' => $post, 'name' => 'atendida'])
                        </x-adminlte-card>
                        --}}
                        {{--  <div class="mb-4">
                        <label for="editorlb" class="form-label">Descripción(*):</label>
                        <textarea readonly disabled id="descripcion" name="descripcion" class="form-control w-full" rows="6"
                            placeholder="Ingrese una descripción detallada del asunto">
                                        {{ old('descripcion', $edit ? $post->descripcion : '') }}</textarea>
                        </div> 
                        --}}
                    <x-adminlte-card name="descripcion" title="Descripción" theme="light" theme-mode="sm" icon=""
                            collapsible="collapsed">
                            {!! old('descripcion', $edit ? $post->descripcion : '') !!} 
                    </x-adminlte-card>
                    {{-- Comentarios --}}
                        <div class="card-tools">
                            <span data-toggle="tooltip" title="Nuevo Mensaje" class="badge badge-light"></span>
                        </div>
                        <x-adminlte-card title="Comentarios" theme="primary" theme-mode="sm" icon="" collapsible>
                            <div >
                                @livewire('components.comentarios', ['post' => $post])
                                <form wire:submit.preventDefault() class="form-group"
                                    action={{ route('comentarios.store') }} method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" id="inputCom" name="mensaje" label="Comentario:"
                                            placeholder="Añadir comentario..." class="form-control">
                                        <input id="post_id" name="post_id" value="{{$post->id}}" hidden>
                                        <span class="input-group-append">
                                            <a href="#">
                                                <button type="success" class="btn btn-primary" icon="fas fa-plane">
                                                    <span class="fas fa-paper-plane"></span>
                                                </button>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </x-adminlte-card>
                </slot>
                <x-slot name="respuesta">
                    <x-todolist :$post />
                    {{-- Respuesta --}}
                    {{---<div class="mb-4">
                        <label for="editorlb" class="form-label text-primary">Respuesta(*):</label>
                        <textarea id="respuesta" name="respuesta" class="form-control w-full" rows="6"
                            placeholder="Ingrese una respuesta detallada para el asunto..." >
                            {{ old('respuesta', $edit ? $post->respuesta : '') }}
                        </textarea>
                        <x-jet-input-error for="respuesta" class="text-danger" />
                    </div>
                    @livewire('posts.modal-accion', ['post' => $post])
                    --}} 
                    <x-adminlte-card name="respuesta" title="Respuesta" theme="light" theme-mode="sm" icon=""
                    collapsible="collapsed">
                            {!! old('respuesta', $edit ? $post->respuesta : '') !!} 
                    </x-adminlte-card>
                    {{--<x-jet-input-error for="respuesta" class="text-danger"/>--}}
                    @livewire('posts.modal-accion', ['post' => $post])
                </x-slot>
            </x-tab>
        @endif

    </fieldset>
    
{{--</div>--}}

@push('js')
    <script>
        //if ($accion !== 'Edit') {
            $(function() {
                $('#tipo_id').focus();
            });
        //} else {
            //$(function() {
            //    $('#inputCom').focus();
            //});
       // }
    </script>
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
        ClassicEditor
            .create(document.querySelector('#respuesta'), {
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    uploadUrl: "{{ route('image.upload') }}"
                }
            })
            .then(function(editor) {
                editor.model.document.on('change:data', () => {
                    @this.set('respuesta', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush('js')
