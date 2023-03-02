<div>
    <div>
        <form wire:submit.prevent="save" class="form-group" method="POST" action="/home/solicitudes" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="card col-md-11">
                        <div class="card-body">
                            @livewire('posts.form-post', ['accion' => 'Create'])
                            {{-- @livewire('admin.editor') --}}
                            <div class="mt-2">
                                {{--<x-adminlte-button label="Enviar" type="button" theme="success" value="Enviar" class="btn bnt float-right"
                                onclick="this.disabled=true; this.value='Enviando...'; this.form.submit()" />--}}
                                <input type="button" value="Enviar  >>" onclick="this.disabled=true; this.value='Enviando...'; this.form.submit()" class="btn btn-success float-right" class="fas fa-paper-plane"/> 
                            </div>
                            <p><i class="text-danger">(*)</i>Campos requeridos</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <div>
</div>