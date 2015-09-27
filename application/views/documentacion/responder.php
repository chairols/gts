<div class="col-sm-8">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
<p class="h3">Responder</p>
<p class="h3">&nbsp;</p>

<?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
 
<div class="form-group">
<label class="col-lg-2 control-label">Productor</label>
<div class="col-lg-4 checkbox">
  <?=$documentacion['productor']['nombre'].' '.$documentacion['productor']['apellido']?>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Compañía</label>
<div class="col-lg-4 checkbox">
    <?=$documentacion['compania']['compania']?>
</div>
</div>
<?php if($admin == 1 && $documentacion['abierta'] == 1) { ?>
<div class="form-group">
    <label class="col-lg-2 control-label">Tipo de operación</label>
    <div class="col-lg-4">
        <select name="tipo_operacion" class="form-control">
            <?php foreach($tipos_operacion as $tipo) { ?>
            <option value="<?=$tipo['idtipo_operacion']?>" <?=($tipo['idtipo_operacion']==$documentacion['tipo_operacion']['idtipo_operacion'])?"selected":""?>><?=$tipo['operacion']?></option>
            <?php } ?>
        </select>
    </div>
</div>

<?php } else { ?>
<div class="form-group">
<label class="col-lg-2 control-label">Tipo de operación</label>
<div class="col-lg-4 checkbox">
  <?=$documentacion['tipo_operacion']['operacion']?>
</div>
</div>
<?php } ?>

<div class="form-group">
<label class="col-lg-2 control-label">Vigencia desde</label>
<div class="col-lg-4 checkbox">
  <?=  strftime('%d-%m-%Y', strtotime($documentacion['desde']))?>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Vigencia hasta</label>
<div class="col-lg-4 checkbox">
  <?= strftime('%d-%m-%Y', strtotime($documentacion['hasta']))?>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Asegurado</label>
<div class="col-lg-4">
  <?=$documentacion['asegurado']?>
</div>
</div>

<div class="form-group">
<label class="col-lg-2 control-label">Fecha de ingreso</label>
<div class="col-lg-4">
    <?= strftime('%d-%m-%Y', strtotime($documentacion['fecha_ingreso']))?>
</div>
</div>


<div class="form-group">
    <label class="col-lg-2 control-label">Asunto</label>
    <div class="col-lg-4">
<?php if($admin == 1 && $documentacion['abierta'] == 1) { ?>
        <input type="text" name="asunto" value="<?=$documentacion['asunto']?>" class="form-control">
<?php } else { ?>
        <?=$documentacion['asunto']?>
<?php } ?>
    </div>
</div>
    
<div class="form-group">
<label class="col-lg-2 control-label">Observacion:</label>
<div class="col-lg-4">
  <?=$documentacion['observacion']?>
</div>
</div>

<table class="table table-condensed">
    <?php foreach ($respuestas as $respuesta) { ?>
    <thead>
        <tr>
            <th class="alert-danger active"><?=$respuesta['usuario']['nombre'].' '.$respuesta['usuario']['apellido']?><div class="pull-right"><?=($respuesta['usuario']['admin']==1)?"<div class='badge alert-danger'>Administrador</div>":"<div class='badge alert-info'>Productor</div>"?></div></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Enviado: <?=  strftime('%d-%m-%Y %H:%M:%S', strtotime($respuesta['fecha']))?></strong><div class="pull-right"><?=($respuesta['adjunto']!='')?"<a href='".$respuesta['adjunto']."' target='__blank'><span class='glyphicon glyphicon-file'></span> Ver Adjunto</a>":""?></div></td>
        </tr>
        <tr>
            <td><?=nl2br($respuesta['respuesta'])?></td>
        </tr>
        
        <tr>
            <td>&nbsp;</td>
        </tr>
    </tbody>
    <?php } ?>
</table>

<?php if($documentacion['abierta'] == 1) { ?>
<div class="form-group">
    <label class="col-lg-2 control-label">Respuesta</label>
    <div class="col-lg-6">
        <textarea class="form-control" rows="6" name="respuesta"></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Adjuntar</label>
    <div class="col-lg-2">
        <input type="file" name="adjunto">
    </div>
</div>




    </p>
    <p>&nbsp;</p>
    <div class="col-lg-4">
      <div align="left">
        <input type="submit" name="submit" id="submit" value="Enviar" class="btn btn-primary">
        <a href="/documentacion/cerrar/<?=$documentacion['iddocumentacion']?>"><input type="button" value="Cerrar Ticket" class="btn btn-primary"></a>
      </div>
    </div>
<?php } ?>
    
    <?php if($documentacion['abierta'] == 0 && $admin == 1) { ?>
    <div class="col-lg-4">
        <div align="left">
            <a href="/documentacion/reabrir/<?=$documentacion['iddocumentacion']?>">
                <input type="button" value="Reabrir Ticket" class="btn btn-primary">
            </a>
            <a href="/documentacion/eliminar/<?=$documentacion['iddocumentacion']?>">
                <input type="button" value="Eliminar Ticket" class="btn btn-primary">
            </a>
        </div>
    </div>
    <?php } ?>
    <div align="center"></div>
</form>
</div>
