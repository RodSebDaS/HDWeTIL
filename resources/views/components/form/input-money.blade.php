   <x-adminlte-input name="{{ $name }}" label="{{ $label }}" value="{{$value}}" placeholder="Ingrese un valor..."
       label-class="text" igroup-size="sm" readonly="{{$readonly}}">
       <x-slot name="prependSlot">
           <div class="input-group-text">
               <i>$</i>
           </div>
       </x-slot>
       <x-slot name="appendSlot">
           <div class="input-group-text">
               <i>,00</i>
           </div>
       </x-slot>
   </x-adminlte-input>

