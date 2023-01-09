
<div class="col-12 col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-tab" role="tablist" wire:ignore>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-datos-tab" data-toggle="pill" href="#custom-tabs-datos"
                        role="tab" aria-controls="custom-tabs-datos" aria-selected="true">{{ $tab1LabelName }}</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-tarea-tab" data-toggle="pill" href="#custom-tabs-tarea"
                            role="tab" aria-controls="custom-tabs-tarea" aria-selected="false">{{ $tab2LabelName }}</a>
                    </li>
                {{--<li class="nav-item">
                    <a class="nav-link" id="custom-tabs-comentario-tab" data-toggle="pill"
                        href="#custom-tabs-comentario" role="tab" aria-controls="custom-tabs-comentario"
                        aria-selected="false">{{ $tab3LabelName }}</a>
                </li>--}}
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-tabContent" wire:ignore>
                <div class="tab-pane fade show active" id="custom-tabs-datos" role="tabpanel"
                    aria-labelledby="custom-tabs-datos-tab">
                        {{ $slot }}
                </div>
                <div class="tab-pane fade" id="custom-tabs-tarea" role="tabpanel"
                    aria-labelledby="custom-tabs-tarea-tab" wire:ignore>
                    @isset($respuesta)
                            {{ $respuesta }}
                    @endisset
                </div>
                {{--<div class="tab-pane fade" id="custom-tabs-comentario" role="tabpanel"
                    aria-labelledby="custom-tabs-comentario-tab">
                    @isset($comentarios)
                            {{ $comentarios }}
                    @endisset
                </div>--}}
            </div>
        </div>
    </div>
</div>
