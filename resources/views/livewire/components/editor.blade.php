<div>
    @php
        $edit = isset($post);
        //$data = str_replace('&', '&amp;', $post->descripcion)
    @endphp
   
    <div class="mb-4" wire:ignore>
        <label for="editorlb" class="form-label text-primary">Descripción(*):</label>
        <textarea id="{{$name}}" name="descripcion" wire:model="descripcion" class="form-control w-full" rows="6"
            placeholder="Ingrese una descripción detallada del asunto">
            {{ old('descripcion', $edit ? $post->descripcion : '' ) }}
        </textarea>
        <x-jet-input-error for="descripcion" class="text-danger" />
    </div>
</div>
@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#{{$name}}'), {
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    uploadUrl: "{{ route('image.upload') }}"
                }
            })
            .then(function(editor) {
                editor.model.document.on('change:data', () => {
                    @this.set('descripcion', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush('js')
