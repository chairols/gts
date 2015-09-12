<link rel="stylesheet" href="/assets/css/blitzer/jquery-ui-1.10.3.custom.min.css" />
<script src="/assets/js/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#ingreso" ).datepicker({dateFormat: "yy-mm-dd"});
    });
</script>

<div class="col-sm-8">
<form class="form-horizontal" method="post">
<p class="h3">Buscar</p>
<p class="h3">&nbsp;</p>

<div class="form-group">
    <label class="col-lg-2 control-label">Sector</label>
    <div class="col-lg-4">
        <select name="sector" class="form-control">
            <option value="0">Seleccionar...</option>
            <?php foreach($tipo_operacion as $tipo) { ?>
            <option value="<?=$tipo['idtipo_operacion']?>"><?=$tipo['operacion']?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Productor</label>
<div class="col-lg-4">
  <select name="productor" class="form-control">
      <option value="0">Seleccionar...</option>
      <?php foreach($productores as $productor) { ?>
      <option value="<?=$productor['idusuario']?>"><?=$productor['apellido'].' '.$productor['nombre']?></option>
      <?php } ?>
  </select>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Número de Siniestro</label>
<div class="col-lg-4">
    <input name="siniestro" id="desde" type="text" class="form-control">
</div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Póliza</label>
    <div class="col-lg-4">
        <input name="poliza" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Asunto</label>
<div class="col-lg-4">
    <input name="asunto" id="desde" type="text" class="form-control">
</div>
</div>


<!--
<div class="form-group">
<label class="col-lg-2 control-label">Fecha</label>
<div class="col-lg-4">
  <input name="fecha_ingreso" id="ingreso" type="text" class="form-control">
</div>
</div>
-->

<div class="form-group">
<label class="col-lg-2 control-label">Compañía</label>
<div class="col-lg-4">
  <select name="compania" class="form-control">
      <option value="0">Seleccionar...</option>
      <?php foreach($companias as $compania) { ?>
      <option value="<?=$compania['idcompania']?>"><?=$compania['compania']?></option>
      <?php } ?>
  </select>
</div>
</div>

    </p>
    <p>&nbsp;</p>
    <div class="col-lg-4">
      <div align="left">
        <input type="submit" name="submit" id="submit" value="Buscar" class="btn btn-primary">
      </div>
    </div>
    
    <div align="center"></div>
</form>
    <br><br><br><br>
    <div class="col-lg-12">
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Póliza</th>
                    <th>Asunto</th>
                    <th>Productor</th>
                    <th>Compañía</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado as $res) { ?>
                <tr>
                    <td><a href="/documentacion/responder/<?=$res['iddocumentacion']?>/"><?=strtoupper(substr($res['tipo_operacion']['operacion'], 0, 3)).'-'?><?=(!empty($res['idsiniestro'])?$res['idsiniestro']:$res['iddocumentacion'])?></a></td>
                    <td><?=$res['poliza']?></td>
                    <td><?=$res['asunto']?></td>
                    <td><?=$res['productor']['nombre'].' '.$res['productor']['apellido']?></td>
                    <td><?=$res['compania']['compania']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

