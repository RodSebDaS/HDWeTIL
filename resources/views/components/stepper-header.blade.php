<div>
    <div class="card bg-transparent mb-3 card-blue card-outline">
        {{-- <div class="card-body"> --}}
        <div class="bs-stepper" id="stepperHeader">
            <div class="bs-stepper-header" role="tablist">
                {{-- Paso1 --}}
                <div class="step" data-target="#logins-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                        id="logins-part-trigger">
                        <span
                            class="bs-stepper-circle {{ $valor->flujovalor_id == 1 ? 'btn-primary' : 'btn-default' }}">1</span>
                        <span class="bs-stepper-label">Inicio</span>
                    </button>
                </div>
                <div class="line"></div>
                {{-- Paso2 --}}
                <div class="step" data-target="#information-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                        id="information-part-trigger">
                        <span
                            class="bs-stepper-circle {{ $valor->flujovalor_id == 2 ? 'btn-primary' : 'btn-default' }}">2</span>
                        <span class="bs-stepper-label">Diagnostico</span>
                    </button>
                </div>
                <div class="line"></div>
                {{-- Paso3 --}}
                <div class="step" data-target="#information-part2">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part2"
                        id="information-part2-trigger">
                        <span
                            class="bs-stepper-circle {{ $valor->flujovalor_id == 3 ? 'btn-primary' : 'btn-default' }}">3</span>
                        <span class="bs-stepper-label">Implementación</span>
                    </button>
                </div>
                <div class="line"></div>
                {{-- Paso4 --}}
                <div class="step" data-target="#information-part3">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part3"
                        id="information-part3-trigger">
                        <span
                            class="bs-stepper-circle {{ $valor->flujovalor_id == 4 ? 'btn-primary' : 'btn-default' }}">4</span>
                        <span class="bs-stepper-label">Solución</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="bs-stepper-content">
            {{-- Contenido - Paso1 --}}
            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
            </div>
            {{-- Contenido - Paso2 --}}
            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
            </div>
            {{-- Contenido - Paso3 --}}
            <div id="information-part2" class="content" role="tabpanel" aria-labelledby="information-part2-trigger">
            </div>
            {{-- Contenido - Paso4 --}}
            <div id="information-part3" class="content" role="tabpanel" aria-labelledby="information-part3-trigger">
            </div>
        </div>
      {{--   <hr />
        <div>current step: <span id="current-step"></span></div> --}}
    </div>
</div>
