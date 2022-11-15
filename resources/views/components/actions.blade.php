<div>
    <div>
        <form action="{{ $rutaDestroy }}" method="POST">
            @csrf
            <div class="btn-group btn-group-xs btn-group-float-right">

                @isset($rutaShow)
                    @can($puedeVer)
                        <a href="{{ $rutaShow }}" id="tooltiphelp" type="button" data-toggle="tooltip" data-placement="top"
                            title="Ver"><i class="fa fa-eye tool Style2"></i></a>
                    @endcan

                @endisset

                @isset($rutaEdit)
                    @can($puedeEditar)
                        <a href="{{ $rutaEdit }}" id="tooltiphelp" type="button" data-toggle="tooltip" data-placement="top"
                            title="Editar"><i class="fa fa-sm fa-fw fa-pen tool Style3"></i></a>
                    @endcan

                @endisset

                @isset($rutaDestroy)
                    @can($puedeEliminar)
                        @method('DELETE')
                        <x-button type="delete" method="POST" theme="tool" icon="fa fa-sm fa-trash Style1"
                            onclick="return confirm('Esta seguro de elemiar el registro?')" id="tooltiphelp" type="submit"
                            data-toggle="tooltip" data-placement="top" title="Eliminar">
                        </x-button>
                    @endcan

                @endisset

                @isset($rutaHistorial)
                    {{-- @can($puedeHistorial) --}}
                    <x-modal id="modalTimeLine" title="Historial de Actividades" theme="teal" titlebtn=""
                        icon="fa fa-sm fa-fw fa-route tool Style0" style="height:20%" class="btn-group btn-group-xs btn-group-float-right">
                                 @livewire('posts.time-line', ['post' => $rutaHistorial])
                    </x-modal>
                    {{-- @endcan --}}
                @endisset
            </div>
        </form>
    </div>
</div>

<script>
    .linea {
        display: inline - block;
    }
</script>
