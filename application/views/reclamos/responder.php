<div class="col-sm-8">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <p class="h3">Carga de Reclamos</p>
    <p class="h3">&nbsp;</p>

    <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Productor</label>
        <div class="col-lg-4 checkbox">
            <?=$reclamo['nombre'].' '.$reclamo['apellido']?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Compañía</label>
        <div class="col-lg-4 checkbox">
            <?=$compania['compania']?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Asunto</label>
        <div class="col-lg-4 checkbox">
            <?=$reclamo['asunto']?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Reclamo</label>
        <div class="col-lg-4 checkbox">
            <?=$reclamo['reclamo']?>
        </div>
    </div>  

        </p>
        <p>&nbsp;</p>
        
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
        
        <?php if($reclamo['abierta'] == 1) { ?>
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
        <a href="/reclamos/cerrar/<?=$reclamo['idreclamo']?>"><input type="button" value="Cerrar Ticket" class="btn btn-primary"></a>
      </div>
    </div>
<?php } ?>
        <div align="center"></div>
    </form>
</div>
