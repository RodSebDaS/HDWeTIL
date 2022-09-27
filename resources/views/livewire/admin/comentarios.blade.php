<div>
    <form id="formCom" class="form-group" method="POST" action="/comentarios" enctype="multipart/form-data">
        @csrf
        <div class="card card-primary direct-chat direct-chat-sky">
            <div class="card-header">
                <h3 class="card-title">Comentarios</h3>
                <div class="card-tools">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">0</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        {{-- </button>
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button> --}}
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    {{-- @if (isset($comentarios)) --}}
                    @foreach ($comentarios as $comentario)
                        @if (Auth::user()->name == $comentario->user->name)
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">{{ $comentario->user->name }}</span>
                                    <span class="direct-chat-timestamp float-right">{{ $comentario->created_at }}</span>
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
                                <form class="form-group" method="POST" action="/home/comentarios/{{ $comentario->id }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text" contenteditable="true">
                                        <input type="text" name="mensaje" class="form-control"
                                            value="{{ $comentario->mensaje }}">
                                    </div>
                                </form>
                                <div class="float-right">
                                    <x-action destroy="/home/comentarios/{{ $comentario->id }}" />
                                </div>
                                {{-- <div class="float-right">
                                    <button type="submit" method="POST" class="btn btn-tool"><i
                                            class="fas fa-pencil-alt"></i></button>
                                </div> --}}
                            </div>
                            <!-- /.direct-chat-text -->
                        @else
                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">{{ $comentario->user->name }}</span>
                                    <span class="direct-chat-timestamp float-left">{{ $comentario->created_at }}</span>
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
                    {{-- @else
                                    {{ "holla" }}
                    @endif --}}
                </div>
                <div class="input-group">
                    <input type="text" id="inputCom" name="mensaje" label="Comentario:" placeholder="Añadir comentario..."
                        class="form-control" >
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Comentar</button>
                    </span>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!--/.direct-chat -->
    </form>
    @push('js')
        <script>
            $(function() {
                $('#inputCom').focus();
            });
        </script>
    @endpush('js')
</div>
