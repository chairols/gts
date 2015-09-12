<div class="col-sm-8">
<form class="form-horizontal" method="post">
<p class="h3">Carga de Factura</p>
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
<label class="col-lg-2 control-label">Comprobante</label>
<div class="col-lg-4">
  <select name="comprobante" id="select" class="form-control">
      <option value="1">Factura</option>
      <option value="2">Recibo</option>
  </select>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Tipo</label>
<div class="col-lg-4">
    <input name="tipo" id="desde" type="text" class="form-control" maxlength="1">
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Número</label>
<div class="col-lg-4">
  <input name="numero" id="hasta" type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Fecha de ingreso</label>
<div class="col-lg-4">
    <input name="fecha" type="text" class="form-control" value="<?=date('Y-m-d', time())?>" readonly>
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
