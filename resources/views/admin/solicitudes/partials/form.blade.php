
 <form class="form-horizontal">
    <fieldset>
    
    <!-- Form Name -->
    <legend></legend>
    
    <!-- Text input-->

  {{-- With label, invalid feedback disabled and form group class --}}
  <div class="row">
    <x-adminlte-input name="iLabel" label="Label" placeholder="placeholder"
        fgroup-class="col-md-12" disable-feedback/>
  </div>


    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Título:</label>  
      <div class="col-md-8">
      <input id="textinput" name="textinput" type="text" placeholder="Ingrese un Título" class="form-control input-md">
      </div>
    </div>
    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Servicio:</label>
      <div class="col-md-8">
        <select id="selectbasic" name="selectbasic" class="form-control">
          <option value="1">Option one</option>
          <option value="2">Option two</option>
        </select>
      </div>
    </div>
    
    <!-- Select Multiple -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectmultiple">Activo:</label>
      <div class="col-md-8">
        <select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
          <option value="1">Option one</option>
          <option value="2">Option two</option>
        </select>
      </div>
    </div>
    
    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textarea">Descripción:</label>
      <div class="col-md-4">                     
        <textarea class="form-control" id="textarea" name="textarea"></textarea>
      </div>
    </div>
    
    <!-- File Button --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="filebutton">Imagen:</label>
      <div class="col-md-4">
        <input id="filebutton" name="filebutton" class="input-file" type="file">
      </div>
    </div>
    
    </fieldset>
    </form>

    

 {{--    @error('name')
    <small class="text-danger">
        {{$message}}
    </small>
    @enderror --}}