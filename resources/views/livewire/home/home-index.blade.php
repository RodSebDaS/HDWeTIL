<div>
    @php $edit = isset($post);@endphp
    <table class="table table-striped shadow-lg mt-4 display" style="width:100%" id="respuestas">
        <thead class="bg-primary text-white">
            <tr>
                <th></th>
            </tr>
        </thead>
        <div class="container-fluid">
            <h2 class="text-center display-5">Preguntas Frecuentes</h2>
        </div>
        <tbody>
            <!-- Main content -->
            <div class="col-md-12">
                {{-- Buscador --}}
                <form action="{{ '/home/posts/buscar' }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <p class="py-2">
                                <a class="btn btn-primary btn-tool float-right" data-toggle="collapse" href="#collapseFiltroSearch"
                                    role="button" aria-expanded="false" aria-controls="collapseFiltroSearch">
                                    <i class="fas fa-filter"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapseFiltroSearch">
                                <div class="card card-body bg-dark">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                {{-- Tipo --}}
                                                <x-adminlte-select2 wire:defer="tipo_id" name="tipo_id" label="Tipo:"
                                                    label-class="text" igroup-size="sm" data-placeholder="Sin Asignar...">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text bg-gradient-info">
                                                            <i class="far fa-clone"></i>
                                                        </div>
                                                    </x-slot>
                                                    @php $selected = old('tipo_id') @endphp
                                                    <option disabled
                                                        {{ empty($selected) ? 'Sin Asignar...' : 'Sin Asignar...' }}></option>
                                                    <option></option>
                                                    @foreach ($tipos as $tipo)
                                                        <option value="{{ $tipo->id }}"
                                                            {{ $selected == $tipo->id ? 'selected' : 'Sin Asignar...' }}>
                                                            {{ $tipo->nombre }}</option>
                                                    @endforeach
                                                </x-adminlte-select2>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                {{-- Propiedad --}}
                                                <x-adminlte-select2 wire:defer="prioridad_id" name="prioridad_id"
                                                    label="Prioridad:" label-class="text" igroup-size="sm"
                                                    data-placeholder="Seleccione una opción...">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text bg-gradient-info">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </div>
                                                    </x-slot>
                                                    @php $selected = old('prioridad_id') @endphp
                                                    {{-- <option></option> --}}
                                                    @foreach ($prioridades as $prioridad)
                                                        <option value="{{ $prioridad->id }}"
                                                            {{ $selected == $prioridad->id ? 'selected' : 'Sin Asignar...' }}>
                                                            {{ $prioridad->nombre }}</option>
                                                    @endforeach
                                                </x-adminlte-select2>
                                            </div>
                                        </div>

                                    {{-- @php
                                            $config = [
                                                'format' => 'DD/MM/YYYY',
                                                'dayViewHeaderFormat' => 'MMM YYYY',
                                                'minDate' => "js:moment().startOf('year')",
                                                'maxDate' => "js:moment().endOf('day')",
                                            ];
                                        @endphp
                                        <div class="col-3">
                                            <div class="form-group">
                                                {{-- Fecha Desde --}
                                                <div>
                                                    <x-adminlte-input-date :config="$config" id="desde" name="desde"
                                                        placeholder="Elija una fecha..." igroup-size="sm" label-class="text"
                                                        value="{{ old('desde') }}" label="Fecha Desde:">
                                                        <x-slot name="prependSlot">
                                                            <x-adminlte-button theme="outline-info"
                                                                icon="far fa-lg fa-calendar-alt" title="Fecha Desde" />
                                                        </x-slot>
                                                    </x-adminlte-input-date>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                {{-- Fecha Hasta --}
                                                <div>
                                                    <x-adminlte-input-date :config="$config" id="hasta" name="hasta"
                                                        placeholder="Elija una fecha..." igroup-size="sm" label-class="text"
                                                        value="{{ old('hasta') }}" label="Fecha Hasta:">
                                                        <x-slot name="prependSlot">
                                                            <x-adminlte-button theme="outline-info"
                                                                icon="far fa-lg fa-calendar-alt" title="Fecha Hasta" />
                                                        </x-slot>
                                                    </x-adminlte-input-date>
                                                </div>
                                            </div>
                                        </div>--}}

                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    {{-- Orden-Sentido --}}
                                                    <x-adminlte-select wire:defer="orden" id="orden_id" name="orden_id"
                                                        label="Orden:" label-class="text" igroup-size="sm"
                                                        data-placeholder="Seleccione una opción...">
                                                        <x-slot name="prependSlot">
                                                            <div class="input-group-text bg-gradient-info">
                                                                <i class="fas fa-sort"></i>
                                                            </div>
                                                        </x-slot>
                                                        @php $selected = old('orden_id', ($edit ? 'orden_id' : '')) @endphp
                                                        {{-- <option></option> --}}
                                                        <option selected>asc</option>
                                                        <option>desc</option>
                                                    </x-adminlte-select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input wire:model="search" type="search" class="form-control form-control-lg"
                                        placeholder="Buscar...">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    {{-- body  --}}
                @foreach ($posts as $post)
                        <div class="col-12 mt-3">
                            <div class="col-md-12">
                                <div class="list-group">
                                    <div class="list-group-item">
                                        <div class="row">
                                            <div class="col-auto">
                                                {{-- @if ($post->image)
                                                    <img class="img-fluid" src="{{Storage::url($post->image->image_url)}}" alt="Photo"
                                                    style="max-height: 75px;">
                                                @else
                                                    <img class="img-fluid" src="https://media.istockphoto.com/id/1277244401/es/foto/hermoso-lago-moraine-en-el-parque-nacional-banff.jpg?s=612x612&w=is&k=20&c=R4c2EvLVvAl3vVV97kTCAAeAMjuPKmPseC1pSqFm9LQ=" alt="Photo"
                                                    style="max-height: 75px;">
                                                @endif --}}
                                            </div>
                                            {{-- <div class="col-md-10"> --}}
                                            {{-- <div class="card"> --}}
                                            {{-- <div class="card-header">
                                                        <h3 class="card-title"></h3> 
                                                    </div> --}}
                                            {{-- <div class="card-body"> --}}
                                            <div id="accordion">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h4 class="card-title w-100">
                                                            <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                                href="#collapseOne" aria-expanded="false">
                                                                <li><strong>{{ $post->titulo }}<strong> <i
                                                                                class="fas fa-question"></i></li>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" data-parent="#accordion"
                                                        style="">
                                                        <div class="card-body">
                                                            <div class="col px-4">
                                                                <div>
                                                                    <div class="float-right">
                                                                        {{ $post->created_at->format('d/m/Y H:i') }}</div>
                                                                    <h3>{{ $post->titulo }}</h3>
                                                                    <div class="mb-4">
                                                                        {!! $post->descripcion !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            @if ($post->puntajes->sum('calificacion') !== 0 && $post->puntajes->sum('calificacion') !== null)
                                                                <label>Votos:
                                                                    {{ $post->puntajes->count() }}</label>&nbsp;<label>Puntaje:
                                                                    {{ $post->puntajes->sum('calificacion') / $post->puntajes->count() }}</label>
                                                            @else
                                                                <label>Votos:
                                                                    {{ 0 }}</label>&nbsp;<label>Puntaje:{{ 0 }}</label>
                                                            @endif
                                                            <a href="{{ route('posts.respuesta', $post->id) }}"
                                                                class="btn btn-success btn-xs float-right">Respuesta</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- </div> --}}
                                            {{-- </div> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </tbody>
    </table>
    {{--<script>
        document.addEventListener('livewire:load', function() {
            $('#tipo_id').select2();
            $('#tipo_id').on('change', function() {
                @this.set('tipo_id', this.value)
            });
        })
    </script>--}}
</div>
