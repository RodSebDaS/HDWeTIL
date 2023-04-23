<div>
    <div class="card">
        <div class="card-body content-center">
            <div class="container-fluid" id="main-content">
                <div class="container">
                    <div>
                        <div class="row">
                            @isset($users)
                                <div class="small-box bg-gradient-olive col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $users }}</h3>
                                        <p>Usuarios Registrados</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($activos)
                                <div class="small-box bg-gradient-navy col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $activos }}</h3>
                                        <p>Activos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    <a href="{{ route('activos.index') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($servicios)
                                <div class="small-box bg-gradient-purple col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $servicios }}</h3>
                                        <p>Servicios</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-server"></i>
                                    </div>
                                    <a href="{{ route('servicios.index') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                        </div>
                        <div class="row py-3">
                            @isset($solicitudes)
                                <div class="small-box bg-primary col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $solicitudes }}</h3>
                                        @if (Auth::User()->current_rol == 'Alumno')
                                            <p>Mis Solicitudes</p>
                                        @elseif(Auth::User()->current_rol == 'Admin')
                                            <p>Solicitudes</p>
                                        @else
                                            <p>Solicitudes</p>
                                        @endif
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-clone"></i>
                                    </div>
                                    <a href="{{ route('solicitudes.index') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($solicitudesSinAtender)
                                <div class="small-box bg-light col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $solicitudesSinAtender }}</h3>
                                            <p>Solicitudes Sin Atender</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-tty"></i>
                                    </div>
                                    <a href="{{ route('solicitudes.sinatender') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($solicitudesAtendidas)
                                <div class="small-box bg-info col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $solicitudesAtendidas }}</h3>
                                            <p>Solicitudes Atendidas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <a href="{{ route('solicitudes.atendidas') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($solicitudesCerradas)
                                <div class="small-box bg-success col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $solicitudesCerradas }}</h3>
                                            <p>Solicitudes Cerradas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-check-circle"></i>
                                    </div>
                                    <a href="{{ route('solicitudes.cerradas') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($solicitudesRechazadas)
                                <div class="small-box bg-secondary col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $solicitudesRechazadas }}</h3>
                                            <p>Solicitudes Rechazadas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-times-circle"></i>
                                    </div>
                                    <a href="{{ route('solicitudes.rechazadas') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($pendientes)
                                <div class="small-box bg-gradient-warning col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $pendientes }}</h3>
                                        <p>Pendientes de Resolver</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-exclamation"></i>
                                    </div>
                                    <a href="{{ route('posts.pendientes') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($incidencias)
                                <div class="small-box bg-gradient-warning col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $incidencias }}</h3>
                                        <p>Incidencias</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-exclamation"></i>
                                    </div>
                                    <a href="{{ route('solicitudes.incidencias') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($asignadas)
                                <div class="small-box bg-gradient-teal col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $asignadas }}</h3>
                                        <p>Asignadas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-reply"></i>
                                    </div>
                                    <a href="{{ route('solicitudes.asignadas') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                            @isset($derivadas)
                                <div class="small-box bg-gradient-teal col-3 mr-5">
                                    <div class="inner">
                                        <h3>{{ $derivadas }}</h3>
                                        <p>Derivadas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-fw fa-share"></i>
                                    </div>
                                    <a href="{{ route('solicitudes.derivadas') }}" class="small-box-footer">
                                        Más info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>