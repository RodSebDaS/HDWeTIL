<div>
        {{-- <x-todolist  :$links="{{ $users->links() }}" ></x-todolist> --}}
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    Lista de Tareas
                </h3>
                <div class="card-tools">
                    <ul class="pagination pagination-sm">
                        {{--  {{$links}} --}}
                    </ul>
                </div>
            </div>
            @csrf
            <div class="card-body">
        
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                    <li class="">
        
                        <span class="handle ui-sortable-handle">
                            <i class="fas fa-ellipsis-v"></i>
                            <i class="fas fa-ellipsis-v"></i>
                        </span>
        
                        <div class="icheck-primary d-inline ml-2">
                            <input type="checkbox" value="" name="todo1" id="todoCheck1">
                            <label for="todoCheck1"></label>
                        </div>
        
                        <span class="text">{{-- {{$tarea}} --}}</span>
        
                        <small class="badge badge-danger"><i class="far fa-clock"></i>{{-- {{$created_at}} --}}</small>
        
                        <div class="tools">
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-trash-o"></i>
                        </div>
                    </li>
            </div>
        
            <div class="card-footer clearfix">
                {{-- <button type="button" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Nueva Tarea</button> --}}
                <x-modal id="modalTarea" title="Tarea" theme="primary" icon="fas fa-plus" style="height:250px;"
                    class="btn-sm float-right bg-primary mr-1" titlebtn="Nueva Tarea">
        
                    {{-- Nombre --}}
                    <div class="row">
                        <x-form.input wire:model.defer="nombre" name="nombre" label="Nombre(*):"
                            placeholder="Ingrese un nombre" value={{-- "{{ old('titulo', $edit ? $post->titulo : '') }}" --}} />
                    </div>
                    {{-- With prepend slot, sm size and label --}}
                    <x-adminlte-textarea wire:model.defer="descripcion" name="descripcion" label="Descripcion" rows=3 label-class="text-warning" igroup-size="sm"
                        placeholder="Ingrese una descripción...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-warning"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>
                    <x-slot name="respuestaSlot">
                        @isset($respuestaSlot)
                            {{-- With slots, sm size and feedback disabled --}}
                            <x-adminlte-textarea wire:model.defer="respuesta" name="respuesta" label="Respuesta" rows=3
                                igroup-size="sm" label-class="text-primary" placeholder="Describa cómo solucionó la tarea..."
                                disable-feedback>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-lg fa-comment-dots text-primary"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-textarea>
                        @endisset
                    </x-slot>
                    <x-slot name="footerSlot">
                        <div class="float-right">
                            <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" class="btn btn-sm"
                                method="" />
                            <x-adminlte-button theme="success" label="Aceptar" class="mr-auto btn btn-sm"
                                icon="fas fa-plus" wire:click="save" />
                        </div>
                    </x-slot>
                </x-modal>
            </div>
        </div>
        
</div>
