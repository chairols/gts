<div class="col-sm-8">
    <form class="form-horizontal" method="post">
    <p class="h3">Perfil del Productor</p>
    <p class="h3">&nbsp;</p>

    <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nombre</label>
        <div class="col-lg-4 checkbox">
            <?=$productor['nombre']?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Apellido</label>
        <div class="col-lg-4 checkbox">
            <?=$productor['apellido']?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Dirección</label>
        <div class="col-lg-4 checkbox">
            <?=$productor['direccion']?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Teléfono</label>
        <div class="col-lg-4 checkbox">
            <?=$productor['telefono']?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Celular</label>
        <div class="col-lg-4 checkbox">
            <?=$productor['celular']?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Email</label>
        <div class="col-lg-4 checkbox">
            <?=$productor['email']?>
        </div>
    </div>
    <?php if($productor['adjunto'] != '') { ?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Adjunto</label>
        <div class="col-lg-4 checkbox">
            <a href="/upload/usuarios/<?=$productor['adjunto']?>" target="_blank">
                <i class="glyphicon glyphicon-file"></i>
            </a>
        </div>
    </div>
    <?php } ?>

    <?php if($admin == 1) { ?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Observacion:</label>
        <div class="col-lg-4 checkbox">
            <?=$productor['observacion']?>
        </div>
    </div>
    <?php } ?>

        
    </form>
    
    <h3>Documentos abiertos</h3><br>
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Fecha</th>
                <th>Tipo de Operación</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($abiertos as $abierto) { ?>
            <tr>
                <td><a href="/documentacion/responder/<?=$abierto['iddocumentacion']?>/"><?=strtoupper(substr($abierto['operacion'], 0, 3)).'-'.$abierto['iddocumentacion']?></a></td>
                <td><?=strftime('%d-%m-%Y', strtotime($abierto['fecha_ingreso']))?></td>
                <td><?=$abierto['operacion']?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>
