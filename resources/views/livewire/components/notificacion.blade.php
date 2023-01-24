<div>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            @if (count($notificaciones))
                <span class="badge badge-warning">{{ count($notificaciones) }}</span>
            @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @if (count($notificaciones) > 0 )
                    <span class="dropdown-item dropdown-header"> {{ count($notificaciones) }} Notificaciones sin leer</span>
                    @foreach ($notificaciones as $notificacion)
                        <div class="dropdown-divider"></div>
                        <a wire:click="marcarLeido({{$notificacion->data['id']}})" class="dropdown-item">
                        {{--<i class="fas fa-envelope mr-2"></i>--}}
                        <i class="float-right text-muted text-sm dropdown-item">
                            <i class="fas fa-file mr-2"></i>Solicitud {{ $notificacion->data['estado'] }}: 
                            <br>
                            {{ $notificacion->data['titulo'] }}
                            <span class="float-right text-muted text-sm"> - {{ $notificacion->created_at->diffForHumans() }} </span>
                        </i>
                        </a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                        {{--<a href="{{ route('marcarLeidos') }}" class="dropdown-item dropdown-footer">Marcar todas como leidas</a>--}}
                        <a wire:click="marcarLeidos" class="dropdown-item dropdown-footer">Marcar todas como leidas</a>
                @else
                    <span class="dropdown-item dropdown-header"> Sin Notificaciones</span>
                @endif
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
        </li>
       
</div>
