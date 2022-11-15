<div>
    @php $edit = isset($roles) @endphp
    <div wire:ignore>
        <form>
            @php $selected = old('rol', ($edit ? $rol : '')) @endphp
            <x-select id="rol" name="rol">
                @foreach ($roles as $rol)
                    <option value="{{ $rol }}"{{ $selected == $rol ? 'selected' : '' }}>
                        {{ $rol }}</option>
                @endforeach
            </x-select>
        </form>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            $('#rol').select();
            $('#rol').on('change', function(){
                /*  alert(this.value) */
                @this.set('rol', this.value);
            });
        });
    </script>
</div>
