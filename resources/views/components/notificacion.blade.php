<div>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if (count(auth()->user()->unreadNotifications))
            <span class="badge badge-warning">{{ count(auth()->user()->unreadNotifications) }}</span>
        @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @if (count(auth()->user()->unreadNotifications) > 0 )
                <span class="dropdown-item dropdown-header"> {{ count(auth()->user()->unreadNotifications) }} Notificaciones sin leer</span>
                @foreach (auth()->user()->unreadNotifications as $notificacion)
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    {{--<i class="fas fa-envelope mr-2"></i>--}}
                    <i class="fas fa-file mr-2"></i> {{ $notificacion->data['titulo']}}
                    <span class="pull-right text-muted text-sm"> - {{ $notificacion->created_at->diffForHumans() }} </span>
                    </a>
                @endforeach
                    <div class="dropdown-divider"></div>
                        <a href="{{ route('marcarLeidos') }}" class="dropdown-item dropdown-footer">Marcar todas como leidas</a>
                    </div>
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
