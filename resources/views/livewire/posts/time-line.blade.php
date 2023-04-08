<div>
    <x-tab tab1LabelName="Acciones" tab2LabelName="Comentarios" tab3LabelName="Observaciones">

        <slot name="datos">
            <div>
                <div class="timeline">
                    <!-- The last icon means the story is complete -->
                    <div class="time-label">
                        @if ($pst !== null)
                            <span class="bg-green xm">{{ $pst->created_at->format('d/m/Y - H:i') }}</span>
                        @endif
                    </div>
                    <div class="time-label">
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                    <div class="text-muted text-left text-break ml-3 py-3">
                        <div class="time-label">
                            <strong><span class="text-muted">Inicio</span></strong>
                            {{-- <p class="text-muted">{{ $pst->created_at->format('d/m/Y - H:i') }}</p>  --}}
                        </div>
                    </div>
                    @if (isset($procesos))
                        @foreach ($procesos as $proceso)
                            <div>
                                <i class="fas fa-file-alt bg-blue"></i>
                                <!-- Timeline item -->
                                <div class="timeline-item">
                                    <!-- Time -->
                                    <span class="time"><i
                                            class="fas fa-clock"></i> {{ $proceso->created_at->format('d/m/Y - H:i') }}</span>
                                    <!-- Header. Optional -->
                                    <h3 class="timeline-header"><a href="#">{{ $proceso->estado->nombre }}
                                            por:
                                            {{ $proceso->role_user_updated_at ?: '' }}-{{ $proceso->user_name_updated_at }}</a>
                                    </h3>
                                    <!-- Body -->
                                    <div class="timeline-body">
                                        {{ $proceso->titulo }}
                                    </div>
                                    <!-- Placement of additional controls. Optional -->
                                    {{-- <p>
                                        <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#collapseExample"
                                            role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Más...
                                        </a>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                        </div>
                                    </div> --}}
                                    <div class="timeline-footer">
                                        <a href="{{ route('solicitudes.show', $proceso->post->id) }}"
                                            class="btn btn-secondary btn-xs">Ver más</a>
                                        {{-- <a class="btn btn-danger btn-sm">Delete</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- Timeline time label -->
                    @php $fechaActual = date ( 'd/m/Y - H:i' ) @endphp
                    <div class="time-label">
                        <span class="bg-green xm">{{ $fechaActual }}</span>
                    </div>
                </div>
            </div>
        </slot>
        <x-slot name="respuesta">
            <div>
                <div class="timeline">
                    <!-- The last icon means the story is complete -->
                    <div class="time-label">
                        @if ($pst !== null)
                            <span class="bg-green xm">{{ $pst->created_at->format('d/m/Y - H:i') }}</span>
                        @endif
                    </div>
                    <div class="time-label">
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                    <div class="text-muted text-left text-break ml-3 py-3">
                        <div class="time-label">
                            <strong><span class="text-muted">Inicio</span></strong>
                        </div>
                    </div>
                    @if (isset($comentarios))
                        @foreach ($comentarios as $comentario)
                
                            <div>
                                <i class="fas fa-comments bg-blue"></i>
                                <!-- Timeline item -->
                                <div class="timeline-item">
                                    <!-- Time -->
                                    <span class="time"><i
                                        class="fas fa-clock"></i> {{ $comentario->created_at->format('d/m/Y - H:i') }}</span>
                                    <!-- Header. Optional -->
                                    <h6 class="timeline-header"><a href="#">Comentó:
                                            {{ $comentario->user_name_created_at }}</a>
                                    </h6>
                                    <!-- Body -->
                                    <div class="timeline-body">
                                        <div class="card bg-light">
                                            {{ $comentario->mensaje }}
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="{{ route('solicitudes.show', $proceso->post->id) }}"
                                                class="btn btn-secondary btn-xs">Ver más</a>
                                            {{-- <a class="btn btn-danger btn-sm">Delete</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- Timeline time label -->
                    @php $fechaActual = date ( 'd/m/Y - H:i' ) @endphp
                    <div class="time-label">
                        <span class="bg-green xm">{{ $fechaActual }}</span>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="comentarios">
            <div>
                <div class="timeline">
                    <!-- The last icon means the story is complete -->
                    <div class="time-label">
                        @if ($pst !== null)
                            <span class="bg-green xm">{{ $pst->created_at->format('d/m/Y - H:i') }}</span>
                        @endif
                    </div>
                    <div class="time-label">
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                    <div class="text-muted text-left text-break ml-3 py-3">
                        <div class="time-label">
                            <strong><span class="text-muted">Inicio</span></strong>
                            {{-- <p class="text-muted">{{ $pst->created_at->format('d/m/Y - H:i') }}</p>  --}}
                        </div>
                    </div>
                    @if (isset($observaciones))
                        @foreach ($observaciones as $observacion)
                            @if ($observacion->observacion !== "" && $observacion->observacion !== null )
                                <div>
                                    <i class="fas fa-calendar-minus bg-blue"></i>
                                    <!-- Timeline item -->
                                    <div class="timeline-item">
                                        <!-- Time -->
                                        <span class="time"><i
                                                class="fas fa-clock"></i> {{ $observacion->created_at->format('d/m/Y - H:i') }}</span>
                                        <!-- Header. Optional -->
                                        <h3 class="timeline-header"><a href="#">{{ $observacion->estado->nombre }}
                                                por:
                                                {{ $observacion->role_user_updated_at ?: '' }}-{{ $observacion->user_name_updated_at }}</a>
                                        </h3>
                                        <!-- Body -->
                                        <div class="timeline-body">
                                            {{ $observacion->observacion }}
                                        </div>
                                        <!-- Placement of additional controls. Optional -->
                                        {{-- <p>
                                            <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Más...
                                            </a>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                            </div>
                                        </div> --}}
                                        <div class="timeline-footer">
                                            <a href="{{ route('solicitudes.show', $proceso->post->id) }}"
                                                class="btn btn-secondary btn-xs">Ver más</a>
                                            {{-- <a class="btn btn-danger btn-sm">Delete</a> --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <!-- Timeline time label -->
                    @php $fechaActual = date ( 'd/m/Y - H:i' ) @endphp
                    <div class="time-label">
                        <span class="bg-green xm">{{ $fechaActual }}</span>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-tab>

</div>
