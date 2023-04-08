@extends('adminlte::page')

@section('title', 'Servicios | Show')

@section('plugins.Select2', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.CKEditor5', true)
@section('plugins.Stepper', true)
@section('plugins.BootstrapSelect', true)

@section('content_header')
    <div class="row justify-content-center">
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
        <div>
            <div class="row justify-content-center">
                <div class="card col-md-11">
                    <div class="card-body clearfix">
                        @livewire('servicios.form-servicio', ['servicio' => $servicio, 'accion' => 'Show'])
                        <div class="mt-2">
                            {{-- <a href="{{ "/home/servicios/$servicio->id/edit" }}">
                                <x-button class="mr-auto float-right btn-sm" type="submit" theme="secondary" label="Editar"
                                    icon="fas fa-pen" />
                            </a> --}}
                        </div>
                       
                    </div>
                    <p><i class="text-danger mr-2">(*)</i>Campos requeridos</p>
                </div>
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
