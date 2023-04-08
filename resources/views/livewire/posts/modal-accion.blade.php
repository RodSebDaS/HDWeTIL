<div>
    @php $edit=isset($post) @endphp
 
    @if ($role == true || $userLevels !== []) {{--Si tiene rol abilita  los botones--}}
       
        @if ($accion == 'Abierta' || $accion == 'Derivada' || $accion == 'Rechazada')
            <div >
                <x-modal id="modalRechazar" title="Rechazar" theme="secondary" icon="far fa-times-circle" style="height:500px;"
                    class="btn-sm float-right bg-secondary mr-1 fluid" titlebtn="Rechazar">
                    <div>
                        {{-- Resumen --}}
                        <div>
                            <h5>Solicitud Nro: {{ $post->id }}</h5>
                            <li>Creado: {{ $post->created_at->format('d/m/Y - H:i') }} </li>
                            <li>Por: {{ $user_created_at->name }} </li>
                            <li>Email: {{ $user_created_at->email }} </li>
                            <li>Asunto: {{ $post->titulo }}</li>
                           {{-- <li>Sla: {{ $post->sla->format('d/m/Y - H:i') }}</li> --}}
                            <hr>
                        </div>
                        {{-- Observaciones --}}
                        <form class="form-group" method="PUT" action="/home/posts/{{ $post->id }}/rechazar"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <x-adminlte-card title="Observaciones" theme="primary" theme-mode="sm" icon="" collapsible>
                                    <div class="mb-4">
                                        <label for="observacion" class="form-label">Descripción(*):</label>
                                        <textarea id="observacion" name="observacion" class="form-control w-full" rows="3" placeholder="Ingrese una descripción detallada del asunto" required minlength="25">{{ old('observacion', $edit ? $post->observacion : '') }}</textarea>
                                    </div>
                                </x-adminlte-card>
                            </div>
                            <hr>
                            {{-- Botones --}}
                            <div>
                                <x-button class="mr-auto float-right btn-sm" type="submit" theme="success" label="Rechazar"
                                        icon="far fa-times-circle" />
                                <x-button type="button" theme="secondary mr-1 float-right btn-sm" icon="fas fa-times"
                                    label="Cancelar" data-dismiss="modal" />
                            </div>
                        </form>
                    </div>
                </x-modal>
            </div>
            <div>
                {{-- Boton Atender --}}
                <div>
                    <a href="{{ route('posts.atender', $post->id) }}">
                         <x-button class="mr-2 float-right btn-sm mb-4" type="submit" theme="success" label="Atender"
                                    icon="fas fa-tty" />
                    </a>
                <div>
               {{-- <x-modal {{--wire:click="$set('open', true)"--} id="modalAtender" title="Atender" theme="teal" icon="fas fa-tty" style="height:1000px;"
                    class="btn-sm float-right bg-teal mr-1" titlebtn="Atender">
                    <div>
                        {{-- Resumen --}
                        <div> 
                            <h5><strong>Solicitud Nro:</strong> {{ $post->id }}</h5>
                            <li><strong>Creado:</strong> {{ $post->created_at->format('d/m/Y - H:i') }} </li>
                            <li><strong>Por:</strong> {{ $user_created_at->name }} </li>
                            <li><strong>Email:</strong> {{ $user_created_at->email }} </li>
                            <li><strong>Asunto:</strong> {{ $post->titulo }}</li>
                            <li><strong>Descripción:</strong><br><br><p class="text-justify">{!! $post->descripcion !!}</p></li>
                            {{--<li>Sla: {{ $post->sla->format('d/m/Y - H:i') }}</li>--}
                        </div>
                        <hr>
                        {{-- Botones --}
                        <div>
                            <a href="{{ route('posts.atender', $post->id) }}">
                                <x-button class="mr-auto float-right btn-sm" type="submit" theme="success" label="Atender"
                                    icon="fas fa-tty" />
                            </a>
                            <x-button type="button" theme="secondary mr-1 float-right btn-sm" icon="fas fa-times"
                                label="Cancelar" data-dismiss="modal" />
                        </div>
                    </div>
                </x-modal> --}}
            </div>
        @elseif ($accion == 'Atendida')
            {{-- Cerrar --}}
            <div>
                <x-modal id="modalCerrar" title="Cerrar" theme="purple" icon="fas fa-book" style="height:500px;"
                    class="btn-sm float-left bg-purple mr-1" titlebtn="Cerrar">
                    <i class="fas fa-exclamation-circle"></i> INFO
                    <form class="form-group" method="PUT" action="/home/posts/{{ $post->id }}/cerrar"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="form-group">
                                <strong>
                                    <p>El inconveniente ha sido resuelto?</p>
                                </strong>
                                {{-- Resuelta? --}}
                                <div
                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="checkCerrar"
                                        name="checkCerrar" value="{{ old('checkCerrar', $post->activa) }}"
                                        {{-- checked="checked" --}}>
                                    <label class="custom-control-label" for="checkCerrar">NO/SI</label>
                                </div>
                                {{-- Observaciones --}}
                                <div class="mt-3">
                                    <x-adminlte-card title="Observaciones" theme="primary" theme-mode="sm"
                                        icon="" collapsible>
                                        {{-- @livewire('components.editor', ['post' => $post, 'name' => 'cerrar]) --}}
                                        <div class="mb-4">
                                            <label for="editorlb" class="form-label">Descripción(*):</label>
                                            <textarea id="observacion" name="observacion" class="form-control w-full" rows="3" placeholder="Ingrese una descripción detallada del asunto" required minlength="25">{{ old('observacion', $edit ? $post->observacion : '') }}</textarea>
                                        </div>
                                    </x-adminlte-card>
                                </div>
                                {{-- Respuesta --}}
                                <div>
                                    <textarea id="rta" name="respuesta" hidden="true">{{ old('respuesta', $edit ? $post->respuesta : '') }}</textarea>
                                </div>
                                <hr>
                                {{-- Botones --}}
                                <div class="mt-2">
                                    {{--  <a href="{{ route('posts.cerrar') }}"> --}}
                                    <x-button class="mr-auto float-right btn-sm" type="submit" theme="success"
                                        label="Cerrar" icon="far fa-calendar-check" />
                                    {{--  </a> --}}
                                    <x-button type="button" theme="secondary mr-1 float-right btn-sm"
                                        icon="fas fa-times" label="Cancelar" data-dismiss="modal" />
                                </div>
                            </div>
                        </div>
                    </form>
                </x-modal>
            </div>
            @if (!$user->hasRole('Especialista'))
                {{-- Derivar --}}
                <x-modal wire:ignore.self id="modalDerivar" title="Derivar" theme="teal" icon="fas fa-share-square" style="height:800px;"
                    class="btn-sm float-left bg-teal" titlebtn="Derivar">
                    <form class="form-group" method="PUT" action="/home/posts/{{ $post->id }}/derivar"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="form-group">
                                {{-- Stepper --}}
                                <div> 
                                    @livewire('posts.stepper', ['post' => $post, 'users' => $users, 'roles' => $roles])
                                </div>
                                {{-- Botones --}}
                                <hr>
                                <div class="float-right">
                                    {{-- <a href="{{ 'home/posts/{post}/derivar' }}"> --}}
                                    <x-button class="mr-auto float-right btn-sm" type="submit" theme="success"
                                        label="Derivar" icon="fas fa-share-square" />
                                    {{-- </a> --}}
                                    <x-button type="button" theme="secondary mr-1 float-right btn-sm" icon="fas fa-times"
                                        label="Cancelar" data-dismiss="modal" />
                                </div>
                            </div>
                        </div>
                    </form>
                </x-modal>
            @endif
        @elseif ($accion == 'Cerrada' && $post->flujovalor->nombre == 'Sin Resolver')
            {{-- Cerrar --}}
            <div>
                <x-modal id="modalCerrar" title="Cerrar" theme="purple" icon="fas fa-book" style="height:500px;"
                    class="btn-sm float-left bg-purple mr-1" titlebtn="Cerrar">
                    <i class="fas fa-exclamation-circle"></i> INFO
                    <form class="form-group" method="PUT" action="/home/posts/{{ $post->id }}/cerrar"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="form-group">
                                <strong>
                                    <p>El inconveniente ha sido resuelto?</p>
                                </strong>
                                {{-- Resuelta? --}}
                                <div
                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="checkCerrar"
                                        name="checkCerrar" value="{{ old('checkCerrar', $post->activa) }}"
                                       {{--  checked="checked" --}}>
                                    <label class="custom-control-label" for="checkCerrar">NO/SI</label>
                                </div>
                                {{-- Observaciones --}}
                                <div class="mt-3">
                                    <x-adminlte-card title="Observaciones" theme="primary" theme-mode="sm"
                                        icon="" collapsible>
                                        {{-- @livewire('components.editor', ['post' => $post, 'name' => 'cerrar]) --}}
                                        <div class="mb-4">
                                            <label for="editorlb" class="form-label">Descripción(*):</label>
                                            <textarea id="observacion" name="observacion" class="form-control w-full" rows="3" placeholder="Ingrese una descripción detallada del asunto" required minlength="25">{{ old('observacion', $edit ? $post->observacion : '') }}</textarea>
                                        </div>
                                    </x-adminlte-card>
                                </div>
                                {{-- Respuesta --}}
                                <div aria-hidden="true">
                                    <textarea id="rta" name="respuesta" hidden="true">{{ old('respuesta', $edit ? $post->respuesta : '') }}</textarea>
                                </div>
                                <hr>
                                {{-- Botones --}}
                                <div class="mt-2">
                                    {{--  <a href="{{ route('posts.cerrar') }}"> --}}
                                    <x-button class="mr-auto float-right btn-sm" type="submit" theme="success"
                                        label="Cerrar" icon="far fa-calendar-check" />
                                    {{--  </a> --}}
                                    <x-button type="button" theme="secondary mr-1 float-right btn-sm"
                                        icon="fas fa-times" label="Cancelar" data-dismiss="modal" />
                                </div>
                            </div>
                        </div>
                    </form>
                </x-modal>
            </div>
            @if (!$user->hasRole('Especialista'))
                {{-- Derivar --}}
                <x-modal wire:ignore.self id="modalDerivar" title="Derivar" theme="teal" icon="fas fa-share-square"
                    style="height:800px;" class="btn-sm float-left bg-teal" titlebtn="Derivar">
                    <form class="form-group" method="PUT" action="/home/posts/{{ $post->id }}/derivar"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="form-group">
                                {{-- Stepper --}}
                                <div>
                                    @livewire('posts.stepper', ['post' => $post, 'users' => $users, 'roles' => $roles])
                                </div>
                                {{-- Botones --}}
                                <hr>
                                <div class="float-right">
                                    {{-- <a href="{{ 'home/posts/{post}/derivar' }}"> --}}
                                    <x-button class="mr-auto float-right btn-sm" type="submit" theme="success"
                                        label="Derivar" icon="fas fa-share-square" />
                                    {{-- </a> --}}
                                    <x-button type="button" theme="secondary mr-1 float-right btn-sm"
                                        icon="fas fa-times" label="Cancelar" data-dismiss="modal" />
                                </div>
                            </div>
                        </div>
                    </form>
                </x-modal>
            @endif
        @endif
    @else
        {{-- Cerrar --}}
        <div>
            <x-modal id="modalCerrar" title="Cerrar" theme="purple" icon="fas fa-book" style="height:500px;"
                class="btn-sm float-left bg-purple mr-1" titlebtn="Cerrar">
                <i class="fas fa-exclamation-circle"></i> INFO
                <form class="form-group" method="PUT" action="/home/posts/{{ $post->id }}/cerrar"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="form-group">
                            <strong>
                                <p>El inconveniente ha sido resuelto?</p>
                            </strong>
                            {{-- Resuelta? --}}
                            <div
                                class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="checkCerrar"
                                    name="checkCerrar" value="{{ old('checkCerrar', $post->activa) }}"
                                    {{-- checked="checked" --}}>
                                <label class="custom-control-label" for="checkCerrar">NO/SI</label>
                            </div>
                            {{-- Observaciones --}}
                            <div class="mt-3">
                                <x-adminlte-card title="Observaciones" theme="primary" theme-mode="sm"
                                    icon="" collapsible>
                                    {{-- @livewire('components.editor', ['post' => $post, 'name' => 'cerrar]) --}}
                                    <div class="mb-4">
                                        <label for="editorlb" class="form-label">Descripción(*):</label>
                                        <textarea id="observacion" name="observacion" class="form-control w-full" rows="3" placeholder="Ingrese una descripción detallada del asunto" required minlength="25">{{ old('observacion', $edit ? $post->observacion : '') }}</textarea>
                                    </div>
                                </x-adminlte-card>
                            </div>
                            {{-- Respuesta --}}
                            <div>
                                <textarea id="rta" name="respuesta" hidden="true">{{ old('respuesta', $edit ? $post->respuesta : '') }}</textarea>
                            </div>
                            <hr>
                            {{-- Botones --}}
                            <div class="mt-2">
                                {{--  <a href="{{ route('posts.cerrar') }}"> --}}
                                <x-button class="mr-auto float-right btn-sm" type="submit" theme="success"
                                    label="Cerrar" icon="far fa-calendar-check" />
                                {{--  </a> --}}
                                <x-button type="button" theme="secondary mr-1 float-right btn-sm"
                                    icon="fas fa-times" label="Cancelar" data-dismiss="modal" />
                            </div>
                        </div>
                    </div>
                </form>
            </x-modal>
        </div>
    @endif
</div>
