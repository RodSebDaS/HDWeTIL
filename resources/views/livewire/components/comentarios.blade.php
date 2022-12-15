<div>
    @php $edit = isset($comentarios) @endphp
    <div class="card card-danger direct-chat direct-chat-lightblue">
        {{--  <div class="card-header">
            <h3 class="card-title">Comentarios</h3>
            <div class="card-tools">
                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">0</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                     </button>
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
       </div> --}}
        <!-- /.card-header -->
    </div>
    <div class="card-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages">
            <!-- Message. Default to the left -->
            {{-- @if (isset($comentarios)) --}}
            @if ($comentarios !== null)
                @foreach ($comentarios as $comentario)
                    @if (Auth::user()->id == $comentario->user->id)
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">{{ $comentario->user->name }}</span>
                                <span
                                    class="direct-chat-timestamp float-right">{{ $comentario->created_at->diffforHumans() }}</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <div class="mt-0">
                                @if ($comentario->user->profile_photo_path)
                                    <img class="direct-chat-img"
                                        src="/storage/{{ $comentario->user->profile_photo_path }}"
                                        alt="{{ $comentario->user->name }}">
                                @else
                                    <img class="direct-chat-img" src="{{ $comentario->user->profile_photo_url }}"
                                        alt="{{ $comentario->user->name }}" />
                                @endif
                            </div>
                            
                            <div class="direct-chat-text" contenteditable="true">

                                {{ $comentario->mensaje }}
                                {{-- <input wire:keydown.enter="inputCom({{ $comentario->mensaje }})" id="inputMsj"
                           type="text" name="mensaje" class="form-control"
                           value="{{ $comentario->mensaje }}"><span id="mjsEdit"hidden></span> --}}
                            </div>
                            {{-- <div class="float-right">
                                @include('posts.partials.actionsComentario', ['comentario' => $comentario->id])

                            </div> --}}
                        </div>
                        <!-- /.direct-chat-text -->
                    @else
                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">{{ $comentario->user->name }}</span>
                                <span
                                    class="direct-chat-timestamp float-left">{{ $comentario->created_at->diffforHumans() }}</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <div class="mt-0">
                                @if ($comentario->user->profile_photo_path)
                                    <img class="direct-chat-img"
                                        src="/storage/{{ $comentario->user->profile_photo_path }}"
                                        alt="{{ $comentario->user->name }}">
                                @else
                                    <img class="direct-chat-img" src="{{ $comentario->user->profile_photo_url }}"
                                        alt="{{ $comentario->user->name }}" />
                                @endif
                            </div>
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{ $comentario->mensaje }}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

    </div>
    <!-- /.card-body -->
    {{--  </div> --}}
    <!--/.direct-chat -->
</div>
@push('js')
    <script>
        $(function() {
            $('#inputCom').focus();
        });
    </script>
    <script>
        inputMsj.oninput = function() {
            mjsEdit.innerHTML = inputMsj.value;
            mensajeEdit.value = inputMsj.value
        };
    </script>
@endpush('js')