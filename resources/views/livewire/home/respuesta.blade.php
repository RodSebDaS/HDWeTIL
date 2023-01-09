<div>
    <div>
        @php $edit = isset($post);@endphp
        {{-- <div class="container-fluid">
            <h2 class="text-center display-4">Search</h2>
        </div> --}}
        @if (session('info'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('info') }}
        </div>
        @endif
        
        <div class="col-12 mt-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="card-body">
                        
                        <div class="col px-4">
                            <div >
                                <div class="float-right">{{ $post->created_at->format('d/m/Y H:i') }}</div>
                                <h3>{{ $post->titulo }}</h3>
                                <div class="mb-4">
                                    <div class="float-right">
                                        <x-calificacion :$puntaje :$voto />
                                    </div>
                                    {!! $post->descripcion !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card  col-md-11">
                <div class="card-header">
                  <h3 class="card-title"><b>SOLUCIÓN</b></h3>
                  <div class="card-tools">
                    <!-- Collapse Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   {!! $post->respuesta !!}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
    </div>
    

</div>
