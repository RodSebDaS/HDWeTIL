    <div {{-- class="card card-white" --}}>
        <body>
            <ul class="navbar-nav ml-auto">
                {{-- Comentarios --}}
                <li class="nav-item dropdown">
                    @if (count($comentarios) > 0)
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="far fa-comments"></i>
                            <span wire:poll.7500ms class="badge badge-info navbar-badge">
                                {{ count($comentarios) }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                            style="left: inherit; right: 0px;">
                            @foreach ($comentarios as $comentario)
                                <a class="dropdown-item"
                                    wire:click="marcarLeidoComentario({{ $comentario->id }} , {{ $comentario->post_id }})">
                                    <div class="media">
                                        @if ($comentario->user->profile_photo_path)
                                            <img src="/storage/{{ $comentario->user->profile_photo_path }}"
                                                alt="{{ $comentario->user->name }}" class="img-size-50 mr-3 img-circle">
                                        @else
                                            <img src="{{ $comentario->user->profile_photo_url }}"
                                                alt="{{ $comentario->user->name }}" class="img-size-50 mr-3 img-circle">
                                        @endif
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                {{ $comentario->user->name }}
                                                <span class="float-right text-sm text-danger">
                                                    <i {{-- class="fas fa-star" --}}></i></span>
                                            </h3>
                                            <p class="text-sm">{{ $comentario->mensaje }}</p>
                                            <p class="text-sm text-muted float-right"><i
                                                    class="far fa-clock mr-1"></i>{{ $comentario->created_at->diffforHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                            @endforeach
                            <a wire:click="marcarLeidosComentarios" class="dropdown-item dropdown-footer">Marcar todos
                                como leidos</a>
                        </div>
                    @else
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-info navbar-badge"></span>
                        </a>
                    @endif
                </li>
                {{-- Notificaciones --}}
                <li class="nav-item dropdown">
                    @if (count($notificaciones) > 0)
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">
                                {{ count($notificaciones) }}
                            </span>
                        </a>
                        @foreach ($notificaciones as $notificacion)
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                                style="left: inherit; right: 0px;">
                                <a class="dropdown-item" wire:click="marcarLeido({{ $notificacion->data['id'] }})">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="dropdown-item-title">
                                                {{-- <i class="fas fa-envelope mr-2"></i> --}}
                                                {{-- <i class="text-muted text-sm text-left dropdown-item"> --}}
                                                <i class="far fa-file mr-2"></i>Solicitud Nro:
                                                {{ $notificacion->data['id'] }} - {{ $notificacion->data['estado'] }}:
                                                <p class="text-sm text-muted">{{ $notificacion->data['titulo'] }}</p>
                                                <p class="text-sm text-muted float-right"><i
                                                        class="far fa-clock mr-1"></i>
                                                    {{ $notificacion->created_at->diffForHumans() }}
                                                </p>
                                                {{-- </i> --}}
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a wire:click="marcarLeidos" class="dropdown-item dropdown-footer">Marcar todas como
                                    leidas</a>
                            </div>
                        @endforeach
                    @else
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge"></span>
                        </a>
                    @endif
                </li>
            </ul>
        </body>
    </div>
