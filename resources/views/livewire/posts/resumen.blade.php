<div class="col-md-2 float-right ml-2">
    <div class="row">
        <div class=".col-md-2">
            <div class="card text-center text-break card-danger">
                <div class="card-header">
                    <h5 class="card-title-center "><small class="font-weight-bold">Acerca de</small></h5>
                </div>
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Tipo</strong>
                    <p class="text-muted">{{ $tipo->nombre }}</p>
                    <hr>
                    <strong><i class="fas fa-clock mr-1"></i>Creado</strong>
                    <p class="text-muted">{{ $post->created_at->format('d-m-Y H:i') }}</p>
                    <hr>
                    <strong><i class="fas fa-user mr-1"></i>Autor</strong>
                    <p class="text-muted">{{ $user_created }}</p>
                    <hr>
                    @if ($accion == 'Derivada')
                        @if ($ruta_solicitud !== null)
                            <strong><i class="fas fa-user-tie mr-1"></i>Atendida Por</strong>
                            <p class="text-muted">{{ $user_atencion }}</p>
                            <hr>
                        @else
                            <strong><i class="fas fa-user-tie mr-1"></i>Derivada a</strong>
                            <p class="text-muted">{{ $user_atencion }}</p>
                            <hr>
                        @endif
                    @elseif ($accion == 'Cerrada')
                        <strong><i class="fas fa-user-tie mr-1"></i>Atendida Por</strong>
                        <p class="text-muted">{{ $atendio }}</p>
                        <hr>
                        @if ($rol == 'Alumno')
                            <strong><i class="fas fa-user mr-1"></i>Cerrada Por</strong>
                        @else
                            <strong><i class="fas fa-user-tie mr-1"></i>Cerrada Por</strong>
                        @endif
                        <p class="text-muted">{{ $user_atencion }}</p>
                        <hr>
                    @else
                        <strong><i class="fas fa-user-tie mr-1"></i>Atendida Por</strong>
                        <p class="text-muted">{{ $user_atencion }}</p>
                        <hr>
                    @endif

                    <strong><i class="far fa-file-alt mr-1"></i>Estado</strong>
                    <p class="text-muted">{{ $accion }}</p>
                    <hr>
                    <strong><i class="fas fa-calendar-alt mr-1"></i>Última Modificación</strong>
                    <p class="text-muted">{{ $post->updated_at->diffforHumans() }}</p>
                    <hr>
                    <strong><i class="far fa-smile mr-1"></i>Calificación</strong>
                    <p class="text-muted">{{ $post->calificacion }}</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('historial.show', $post->id) }}" id="tooltiphelp" type="button"
                        data-toggle="tooltip" data-placement="top" title="Historial de Actividades"><i
                            class="fa fa-sm fa-fw fa-route tool Style0"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
