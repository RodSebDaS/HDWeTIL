@extends('adminlte::page')

@section('title', 'Servicios | Show')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Stepper', true)
@section('plugins.BootstrapSelect', true)

@section('content_header')
    <div class="row justify-content-center py-3">
        <div class="col-md-11">
            <a href="{{ route('servicios.index') }}">
                <x-adminlte-button class="btn-sm float-right" label="Atras" theme="secondary"
                    icon="fas fa-arrow-circle-left" />
            </a>
            <h1>Servicio</h1>
        </div>
    </div>
@stop

@section('content')
    <form action="" method="post">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card card-secondary card-outline col-md-11">
                    <div class="card-header">
                        <h6 class="card-title"><strong><i class="far fa-file-alt"></i> Datos:</strong></h6>
                        <div class="card-tools">
                            <!-- Collapse Button -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                        <!-- /.card-header -->
                    <div class="card-body">
                        <p class="text-justify">
                            @livewire('servicios.form-servicio', ['servicio' => $servicio, 'accion' => 'Show'])
                        </p>
                    </div>
                    <!-- /.card-body -->
                  {{--   <hr>
                    <div class="mt-2">
                        <x-adminlte-button theme="success" label="Guardar" type="submit" class="btn btn-sm float-right"
                            icon="fas fa-save" />
                            <p><i class="text-danger">(*)</i>Campos requeridos</p>
                            <br>
                    </div> --}}
                </div>
                <!-- /.card -->
            </div>
        </div>  
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="bs-stepper.min.css">
@stop

@section('js')
    <script src="bs-stepper.min.js"></script>
    <script>
        var stepper = new Stepper(document.querySelector("#stepperHeader"));
            setCurrent();

            function next() {
                stepper.next();
                setCurrent();
            }

            function previous() {
                stepper.previous();
                setCurrent();
            }

            function setCurrent() {
                document.getElementById("current-step").innerText = stepper._currentIndex;
            }
            /* $("#stepper")[0].addEventListener('shown.bs-stepper', function (event) {
            console.log("hello " + event.detail.indexStep)
            }); */
    </script>
    <script>
        var stepper = new Stepper(document.querySelector("#stepper"));
            setCurrent();

            function next() {
                stepper.next();
                setCurrent();
            }

            function previous() {
                stepper.previous();
                setCurrent();
            }

            function setCurrent() {
                document.getElementById("current-step").innerText = stepper._currentIndex;
            }
            /* $("#stepper")[0].addEventListener('shown.bs-stepper', function (event) {
            console.log("hello " + event.detail.indexStep)
            }); */
    </script>
@stop
