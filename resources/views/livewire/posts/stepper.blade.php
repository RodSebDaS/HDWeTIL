<div>
    <div class="bs-stepper" id="stepper">
        <div class="bs-stepper-header" role="tablist">
            <!-- your steps here -->
            {{-- Paso1 --}}
            <div class="step" data-target="#logins-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Incio</span>
                </button>
            </div>
            <div class="line"></div>
            {{-- Paso2 --}}
            <div class="step" data-target="#information-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                    id="information-part-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Observaciones</span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            {{-- Contenido - Paso1 --}}
        
            <div wire:ignore.self id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    {{--  <x-select-bs wire:model.defer="grupo" :valores="$roles" id="grupo" name="grupo"/>--}}
                  
                    <div wire:ignore class="mb-4" >

                        <h6 class="text-left font-weight-light">Para(*):</h6>
                        {{-- Grupo --}}
                        <x-adminlte-select2 wire:model="rol" id="rol_id" name="rol_id" label="Grupo:" label-class="text"
                        igroup-size="sm" data-placeholder="Seleccione una opción..." required>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-green">
                                <i class="fas fa-user-friends"></i>
                            </div>
                        </x-slot>
                       <option>Seleccione una opción...</option>
                        @php $selected = old('rol_id') @endphp
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $selected == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
        
                        </x-adminlte-select2>
                    </div>
                    <div>
                        <x-adminlte-select2 id="user_id" name="user_id" label="Usuario:" label-class="text"
                            igroup-size="sm" data-placeholder="Seleccione una opción..." required>
                            <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            </x-slot>
                                <option>Seleccione una opción...</option>
                                @php $selected = old('user_id') @endphp
                                
                                @if ($users != null)
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $selected == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                @endif
                        </x-adminlte-select2>
                    </div> 
                    {{-- User --}}
                    {{-- @php
                        $config = [
                            'data-placeholder' => 'Seleccione opción...',
                            'allowClear' => true,
                        ];
                    @endphp --}}
                  
                       
                    {{-- <x-adminlte-select2 id="usuarios" name="usuarios" label="Usuario:" label-class="text"
                        igroup-size="sm" multiple required :config="$config" data-placeholder="Seleccione una opción...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-user-friends"></i>
                            </div>
                        </x-slot>
                    
                        @php $selected = old('user_id') @endphp
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $selected == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </x-adminlte-select2> --}}
                    {{-- @error('user_id') <span class="error">{{ $message }}</span> @enderror --}}
                

                {{-- Comentario 
                <div class="mt-4">
                    <x-adminlte-card title="Comentario" theme="primary" theme-mode="sm" icon=""
                        collapsible="collapsed">
                        <div>
                            @livewire('components.comentarios', ['post' => $post])
                        </div>{{--  --}
                    </x-adminlte-card>
                </div> --}}

                {{-- Botones --}}
                <div class="float-right">
                    {{-- <button
                        wire:click="derivar({{ $post }},'{{ $users }}','{{ $roles }}','{{ $comentarios }}')"
                        class="btn btn-primary" onclick="derivar()">Derivar</button> --}}
                    <a class="btn btn-sm btn-primary" href="#" role="button" onclick="next()">Siguiente <i
                            class="fas fa-angle-right"></i></a>
                </div>
            </div>

            {{-- Contenido - Paso2 --}}
            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                <h6 class="text-left font-weight-light"></h6>

                {{-- Observaciones --}}
                <div class="mt-2">
                    {{--<x-adminlte-card title="Observación" theme="primary" theme-mode="sm" icon=""
                        collapsible="collapsed">
                        @livewire('components.editor', ['post' => $post])
                    </x-adminlte-card>--}}
                    <div class="mt-3">
                        <x-adminlte-card title="Observaciones" theme="primary" theme-mode="sm"
                            icon="" collapsible="collapsed">
                            <div class="mb-4">
                                <label for="editorlb" class="form-label">Descripción(*):</label>
                                <textarea id="observacion" name="observacion" class="form-control w-full" rows="3" placeholder="Ingrese una descripción detallada del asunto" {{--required minlength="25"--}}>{{ old('observacion', $post->observacion) }}</textarea>
                            </div>
                        </x-adminlte-card>
                    </div>
                </div>

                {{-- Botones --}}
                <div class="float-left">
                    <a class="btn btn-sm btn-primary" href="#" role="button" onclick="previous()"><i
                            class="fas fa-angle-left"></i> Anterior</a>
                    {{--  <button
                    wire:click="derivar({{ $post }},'{{ $users }}','{{ $roles }}','{{ $comentarios }}')"
                    class="btn btn-primary" onclick="derivar()">Derivar</button> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('#rol_id').select2();
            $('#rol_id').on('change', function() {
                @this.set('rol', this.value)
            });
        })
    </script>
</div>
{{-- <hr />
<div>current step: <span id="current-step"></span></div> --}}