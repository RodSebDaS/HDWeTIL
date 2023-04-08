<div>
    {{-- Calificación --}}
    <div class="mt-3">
        <hr>
        <label>Calificación:</label>

            @if ($puntaje->sum('calificacion') !== 0 && $puntaje->sum('calificacion') !== null)
                <p>
                    @if ((($puntaje->sum('calificacion') / $puntaje->count()) >= 5))
                                <p class="clasificacion fa-2x">
                                    <input wire:click="puntuacion({{ 5 }})" id="radio1" type="radio" name="calificacion" value="5" checked>
                                    <label for="radio1">★</label>
                                    <input  wire:click="puntuacion({{ 4 }})" id="radio2" type="radio" name="calificacion" value="4" >
                                    <label for="radio2">★</label>
                                    <input  wire:click="puntuacion({{ 3 }})" id="radio3" type="radio" name="calificacion" value="3" >
                                    <label for="radio3">★</label>
                                    <input  wire:click="puntuacion({{ 2 }})" id="radio4" type="radio" name="calificacion" value="2" >
                                    <label for="radio4">★</label>
                                    <input  wire:click="puntuacion({{ 1 }})" id="radio5" type="radio" name="calificacion" value="1" >
                                    <label for="radio5">★</label>
                                </p>
                    @elseif ((($puntaje->sum('calificacion') / $puntaje->count()) >= 4) && (($puntaje->sum('calificacion') / $puntaje->count()) < 5 ))
                                <p class="clasificacion fa-2x">
                                    <input  wire:click="puntuacion({{ 5 }})" id="radio1" type="radio" name="calificacion" value="5" >
                                    <label for="radio1">★</label>
                                    <input wire:click="puntuacion({{ 4 }})" id="radio2" type="radio" name="calificacion" value="4" checked>
                                    <label for="radio2">★</label>
                                    <input  wire:click="puntuacion({{ 3 }})" id="radio3" type="radio" name="calificacion" value="3" >
                                    <label for="radio3">★</label>
                                    <input  wire:click="puntuacion({{ 2 }})" id="radio4" type="radio" name="calificacion" value="2" >
                                    <label for="radio4">★</label>
                                    <input  wire:click="puntuacion({{ 1 }})" id="radio5" type="radio" name="calificacion" value="1" >
                                    <label for="radio5">★</label>
                                </p>
                    @elseif ((($puntaje->sum('calificacion') / $puntaje->count()) >= 3) && (($puntaje->sum('calificacion') / $puntaje->count()) < 4 ))
                        <p class="clasificacion fa-2x">
                            <input  wire:click="puntuacion({{ 5 }})" id="radio1" type="radio" name="calificacion" value="5" >
                            <label for="radio1">★</label>
                            <input  wire:click="puntuacion({{ 4 }})" id="radio2" type="radio" name="calificacion" value="4" >
                            <label for="radio2">★</label>
                            <input wire:click="puntuacion({{ 3 }})" id="radio3" type="radio" name="calificacion" value="3" checked>
                            <label for="radio3">★</label>
                            <input  wire:click="puntuacion({{ 2 }})" id="radio4" type="radio" name="calificacion" value="2" >
                            <label for="radio4">★</label>
                            <input wire:click="puntuacion({{ 1 }})" id="radio5" type="radio" name="calificacion" value="1" >
                            <label for="radio5">★</label>
                        </p>
                    @elseif ((($puntaje->sum('calificacion') / $puntaje->count()) >= 2) && (($puntaje->sum('calificacion') / $puntaje->count()) < 3 ))
                        <p class="clasificacion fa-2x">
                            <input  wire:click="puntuacion({{ 5 }})" id="radio1" type="radio" name="calificacion" value="5" >
                            <label for="radio1">★</label>
                            <input  wire:click="puntuacion({{ 4 }})" id="radio2" type="radio" name="calificacion" value="4" >
                            <label for="radio2">★</label>
                            <input  wire:click="puntuacion({{ 3 }})" id="radio3" type="radio" name="calificacion"  value="3" >
                            <label for="radio3">★</label>
                            <input wire:click="puntuacion({{ 2 }})" id="radio4" type="radio" name="calificacion" value="2" checked>
                            <label for="radio4">★</label>
                            <input wire:click="puntuacion({{ 1 }})" id="radio5" type="radio" name="calificacion" value="1">
                            <label for="radio5">★</label>
                        </p>
                    @elseif ((($puntaje->sum('calificacion') / $puntaje->count()) >= 1) && (($puntaje->sum('calificacion') / $puntaje->count()) < 2 ))
                                <p class="clasificacion fa-2x">
                                    <input  wire:click="puntuacion({{ 5 }})" id="radio1" type="radio" name="calificacion" value="5">
                                    <label for="radio1">★</label>
                                    <input  wire:click="puntuacion({{ 4 }})" id="radio2" type="radio" name="calificacion"  value="4">
                                    <label for="radio2">★</label>
                                    <input  wire:click="puntuacion({{ 3 }})" id="radio3" type="radio" name="calificacion"  value="3">
                                    <label for="radio3">★</label>
                                    <input wire:click="puntuacion({{ 2 }})" id="radio4" type="radio" name="calificacion" value="2">
                                    <label for="radio4">★</label>
                                    <input wire:click="puntuacion({{ 1 }})" id="radio5" type="radio" name="calificacion" value="1" checked>
                                    <label for="radio5">★</label>
                                </p>
                    @endif
                </p>
                <label>Votos: {{ $puntaje->count() }}</label>&nbsp;<label>Puntaje:
                    {{ round(($puntaje->sum('calificacion') / $puntaje->count()),2) }}</label>
                <hr>
            @else
                <p class="clasificacion fa-2x">
                    <input  wire:click="puntuacion({{ 5 }})" id="radio1" type="radio" name="calificacion" value="5" >
                    <label for="radio1">★</label>
                    <input wire:click="puntuacion({{ 4 }})" id="radio2" type="radio" name="calificacion" value="4" >
                    <label for="radio2">★</label>
                    <input  wire:click="puntuacion({{ 3 }})" id="radio3" type="radio" name="calificacion" value="3" >
                    <label for="radio3">★</label>
                    <input  wire:click="puntuacion({{ 2 }})" id="radio4" type="radio" name="calificacion" value="2" >
                    <label for="radio4">★</label>
                    <input  wire:click="puntuacion({{ 1 }})" id="radio5" type="radio" name="calificacion" value="1" >
                    <label for="radio5">★</label>
                </p>
                    <label>Votos: {{ 0 }}</label>&nbsp;<label>Puntaje: {{ 0 }}</label>
                <hr>
            @endif
    </div>

    <style>
        #form {
            width: 250px;
            margin: 0 auto;
            height: 50px;
        }

        #form p {
            text-align: center;
        }

        #form label {
            font-size: 50px;
        }

        input[type="radio"] {
            display: none;
        }

        label {
            color: grey;
        }

        .clasificacion {
            direction: rtl;
            unicode-bidi: bidi-override;
        }

        label:hover,
        label:hover~label {
            color: orange;
        }

        input[type="radio"]:checked~label {
            color: orange;
        }
    </style>
</div>
