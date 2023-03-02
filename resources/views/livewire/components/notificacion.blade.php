<div>
   <div class="card card-white">
        <body>
            <div class="contenedor">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    @if (count($notificaciones))
                        <span wire:poll.7500ms class="badge badge-warning">{{ count($notificaciones) }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="card card-primary card-outline"> 
                        @if (count($notificaciones) > 0 )
                            <span class="dropdown-item dropdown-header"> {{ count($notificaciones) }} Notificaciones sin leer</span>
                            <ul class="nav-item dropdown scroll">
                                @foreach ($notificaciones as $notificacion)
                                    <li class="nav-item dropdown">
                                        <div class="content-fluid">
                                            <div class="row  justify-content-center ">
                                                <div class="col-md-12">
                                                    <div class="dropdown-divider"></div>
                                                        <a wire:click="marcarLeido({{$notificacion->data['id']}})" class="dropdown-item">
                                                            {{--<i class="fas fa-envelope mr-2"></i>--}}
                                                            <i class="float-right text-muted text-sm dropdown-item">
                                                            <i class="fas fa-file mr-2"></i>Solicitud Nro: {{$notificacion->data['id']}} - {{ $notificacion->data['estado'] }}: 
                                                            <br>
                                                            <p>{{  $notificacion->data['titulo'] }}</p>
                                                            <span class="float-right text-muted text-sm "> - {{ $notificacion->created_at->diffForHumans() }} </span>
                                                            </i>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>  
                            <div class="dropdown-divider"></div>
                                {{--<a href="{{ route('marcarLeidos') }}" class="dropdown-item dropdown-footer">Marcar todas como leidas</a>--}}
                                <a wire:click="marcarLeidos" class="dropdown-item dropdown-footer">Marcar todas como leidas</a>
                            @else
                                <span class="dropdown-item dropdown-header"> Sin Notificaciones</span>
                            @endif
                    </div>   
                </div>
                    {{--<div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                    </a>--}}
                    {{--<div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                    </a>--}}
            </div>
        </body>
    </div>
</div>
   
