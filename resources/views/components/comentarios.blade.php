<div>
    <form class="form-group" method="POST" action="/home/comentarios" enctype="multipart/form-data">
        @csrf
        <div class="card card-primary direct-chat direct-chat-info">
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
                    @if (isset($comentarios))
                        @foreach ($comentarios as $comentario)
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span
                                        class="direct-chat-name float-left">{{ old(Auht::User()->name, $edit ? $comentario->user->name : '') }}</span>
                                    <span
                                        class="direct-chat-timestamp float-right">{{ old('', $edit ? $comentario->created_at : '') }}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <div class="mt-0">
                                    @if (Auth::user()->profile_photo_path)
                                        <img class="direct-chat-img"
                                            src="/storage/{{ Auth::user()->profile_photo_path }}"
                                            alt="{{ Auth::user()->name }}">
                                    @else
                                        <img class="direct-chat-img" src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    @endif
                                </div>
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    {{ old('', $edit ? $comentario->mensaje : '') }}
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            {
                        @endforeach
                    @else
                    @endif

                </div>
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="/docs/3.1//assets/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                </div>

                <!-- /.card-body -->
                <div class="input-group">
                    <input type="text" name="mensaje" label="Comentario:" placeholder="Añadir comentario..."
                        class="form-control">
                   {{--  <input type="hidden" name="incidencia_id" value="{{}}"> --}}

                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Comentar</button>
                    </span>
                </div>
            </div>
            <!--/.direct-chat -->
    </form>
</div>