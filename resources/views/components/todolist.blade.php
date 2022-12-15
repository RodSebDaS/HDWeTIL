@php
    $edit = isset($post);
@endphp
<div class="card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            Lista de Tareas
        </h3>
     {{--    <div class="card-tools">
            <ul class="pagination pagination-sm">
                @isset($tareas)
                    {{ $tareas->links() }}
                @endisset
            </ul>
        </div> --}}
    </div>
   {{--  <form class="form-group" method="POST" action="/home/tareas/{{ $post->id }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @foreach ($tareas as $tarea)
            <div class="card">
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                    <li class="mt-0">
                        <span class="handle ui-sortable-handle">
                            <i class="fas fa-ellipsis-v"></i>
                            <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <div class="icheck-primary d-inline ml-2">
                            <input type="checkbox" value="{{ $tarea->tarea->activa }}" name="activa" id="todoCheck1">
                            <label for="todoCheck1"></label>
                        </div>
                        <span class="text">{{ $tarea->tarea->nombre }}</span>
                        <small class="badge badge-info"><i
                                class="far fa-clock"></i>{{ $tarea->created_at->diffforHumans() }}</small>
                        <div class="tools">
                            <a data-toggle="modal" data-target="#modalTarea"><i
                                    wire:click="edit({{ $tarea->tarea->id }})" class="fas fa-edit text-primary"></i>
                            </a>
                            <i wire:click="destroy({{ $tarea->tarea->id }})"
                                onclick="return confirm('Esta seguro de elemiar la tarea?')" class="fas fa-trash"></i>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-footer clearfix" wire:ignore>
                <x-modal id="modalTarea" title="Tarea" theme="primary" icon="fas fa-plus" style="height:300px;"
                    class="btn-sm float-right bg-primary mr-1" titlebtn="Nueva Tarea" btnSlot="true">
                    {{-- Nombre --}
                    <div class="row">
                        <x-form.input id="nombre" name="nombre" label="Nombre(*):"
                            placeholder="Ingrese un nombre"
                            value="{{ old('nombre', $edit ? $tarea->tarea->nombre : '') }}" required />
                    </div>
                    {{-- Descripcion --}
                    <x-adminlte-textarea id="descripcions" name="descripcions" label="Description" rows=3
                        label-class="text-warning" igroup-size="sm" placeholder="Ingrese una descripción..."
                        value="{{ old('descripcions', $edit ? $tarea->tarea->descripcion : '') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-warning"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>
                    {{-- Respuesta --}
                    <div class="mb-4" wire:ignore>
                        <label for="editorlb" class="form-label text-primary">Respuesta(*):</label>
                        <textarea id="respuesta" name="respuesta" class="form-control w-full" rows="6"
                            placeholder="Ingrese una descripción detallada del asunto"
                            value="{{ old('respuesta', $edit ? $tarea->respuesta : '') }}">
                                    </textarea>
                        <x-jet-input-error for="respuesta" class="text-danger" />
                    </div>
                    <x-slot name="footerSlot">
                        <div class="float-right">
                            <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" class="btn btn-sm"
                                method="" />
                            <x-adminlte-button type="submit" theme="success" label="Aceptar"
                                class="mr-auto btn btn-sm" icon="fas fa-plus" />
                        </div>
                    </x-slot>
                </x-modal>
            </div>
        @endforeach
    </form> --}}
</div>

