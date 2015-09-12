<link rel="stylesheet" href="/assets/css/blitzer/jquery-ui-1.10.3.custom.min.css" />
<script src="/assets/js/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#desde" ).datepicker({
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#hasta" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#hasta" ).datepicker({
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#desde" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        
       
    });
</script>
<div class="row">
<div class="col-sm-8">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
<p class="h3">Carga de solicitud</p>
<p class="h3">&nbsp;</p>

<?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
    
<div class="form-group">
<label class="col-lg-2 control-label">Productor</label>
<div class="col-lg-4">
  <select name="productor" class="form-control">
      <?php foreach($productores as $productor) { ?>
      <option value="<?=$productor['idusuario']?>"><?=$productor['apellido'].' '.$productor['nombre']?></option>
      <?php } ?>
  </select>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Compañía</label>
<div class="col-lg-4">
  <select name="compania" class="form-control">
      <?php foreach($companias as $compania) { ?>
      <option value="<?=$compania['idcompania']?>"><?=$compania['compania']?></option>
      <?php } ?>
  </select>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Tipo de operación</label>
<div class="col-lg-4">
  <select name="tipo_operacion" id="select" class="form-control">
      <?php foreach($tipos_operacion as $tipo) { ?>
      <option value='<?=$tipo['idtipo_operacion']?>'><?=$tipo['operacion']?></option>
      <?php } ?>
  </select>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Vigencia desde</label>
<div class="col-lg-4">
  <input name="desde" id="desde" type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Vigencia hasta</label>
<div class="col-lg-4">
  <input name="hasta" id="hasta" type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Asegurado</label>
<div class="col-lg-4">
  <input name="asegurado" type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Fecha de ingreso</label>
<div class="col-lg-4">
    <input name="fecha_ingreso" id="ingreso" type="text" class="form-control" readonly value="<?=  date("Y-m-d", time())?>">
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Modo de ingreso</label>
<div class="col-lg-4">
  <select name="modo_ingreso" id="select2" class="form-control">
  </select>
</div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Asunto</label>
    <div class="col-lg-4">
        <input name="asunto" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Observacion:</label>
<div class="col-lg-4">
  <textarea name="observacion" class="form-control"></textarea>
</div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Adjunto</label>
    <div class="col-lg-4">
        <input type="file" class="form-control" name="adjunto">
    </div>
</div>

    </p>
    <p>&nbsp;</p>
    <div class="col-lg-4">
      <div align="left">
        <input type="submit" name="submit" id="submit" value="Enviar" class="btn btn-primary">
      </div>
    </div>
    
    <div align="center"></div>
</form>
</div>
</div>