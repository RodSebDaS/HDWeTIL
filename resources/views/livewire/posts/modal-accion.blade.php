<div>
    @php $edit=isset($post) @endphp
    @if ($accion == 'Abierta')
        <div>
            <x-modal id="modalAtender" title="Atender" theme="teal" icon="fas fa-tty" style="height:300px;"
                class="btn-sm float-right bg-teal mr-1" titlebtn="Atender">
                <div>
                    {{-- Resumen --}}
                    <div>
                        <h5>Solicitud Nro: {{ $post->id }}</h5>
                        <li>Creado: {{ $post->created_at->format('d/m/Y - H:i') }} </li>
                        <li>Por: {{ $user_created_at->name }} </li>
                        <li>Email: {{ $user_created_at->email }} </li>
                        <li>Asunto: {{ $post->titulo }}</li>
                        <li>Sla: {{ $post->sla->format('d/m/Y - H:i') }}</li>
                    </div>
                    <hr>
                    {{-- Botones --}}
                    <div>
                        <a href="{{ route('posts.atender', $post->id) }}">
                            <x-button class="mr-auto float-right btn-sm" type="submit" theme="success" label="Atender"
                                icon="fas fa-tty" />
                        </a>
                        <x-button type="button" theme="secondary mr-1 float-right btn-sm" icon="fas fa-times"
                            label="Cancelar" data-dismiss="modal" />
                    </div>
                </div>
            </x-modal>
        </div>
    @elseif ($accion == 'Atendida')
        {{-- Cerrar --}}
        <div>
            <x-modal id="modalCerrar" title="Cerrar" theme="purple" icon="fas fa-book" style="height:400px;"
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
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="checkCerrar" name="checkCerrar"
                                    value="{{ old('checkCerrar', $post->activa) }}" checked="checked">
                                <label class="custom-control-label" for="checkCerrar"></label>
                            </div>
                            {{-- Observaciones --}}
                            <div class="mt-3">
                                <x-adminlte-card title="Observaciones" theme="primary" theme-mode="sm" icon=""
                                    collapsible="collapsed">
                                    @livewire('components.editor', ['post' => $post])
                                </x-adminlte-card>
                            </div>
                            <hr>
                            {{-- Botones --}}
                            <div class="mt-2">
                                {{--  <a href="{{ route('posts.cerrar') }}"> --}}
                                <x-button class="mr-auto float-right btn-sm" type="submit" theme="success"
                                    label="Cerrar" icon="far fa-calendar-check" />
                                {{--  </a> --}}
                                <x-button type="button" theme="secondary mr-1 float-right btn-sm" icon="fas fa-times"
                                    label="Cancelar" data-dismiss="modal" />
                            </div>
                        </div>
                    </div>
                </form>
            </x-modal>
        </div>
        {{-- Derivar --}}
        <x-modal id="modalDerivar" title="Derivar" theme="teal" icon="fas fa-share-square" style="height:800px;"
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
                            <x-button class="mr-auto float-right btn-sm" type="submit" theme="success" label="Derivar"
                                icon="fas fa-share-square" />
                            {{-- </a> --}}
                            <x-button type="button" theme="secondary mr-1 float-right btn-sm" icon="fas fa-times"
                                label="Cancelar" data-dismiss="modal" />
                        </div>
                    </div>
                </div>
            </form>
        </x-modal>
    @endif
</div>
