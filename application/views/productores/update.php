<div class="col-sm-8">
    <form class="form-horizontal" method="post">
    <p class="h3">Perfil del Productor</p>
    <p class="h3">&nbsp;</p>

    <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nombre</label>
        <div class="col-lg-4 checkbox">
            <input type="text" name="nombre" class="form-control" id="nombre" value="<?=$productor['nombre']?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Apellido</label>
        <div class="col-lg-4 checkbox">
            <input type="text" name="apellido" class="form-control" value="<?=$productor['apellido']?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Dirección</label>
        <div class="col-lg-4 checkbox">
            <input type="text" name="direccion" class="form-control" value="<?=$productor['direccion']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Teléfono</label>
        <div class="col-lg-4 checkbox">
            <input type="text" name="telefono" class="form-control" value="<?=$productor['telefono']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Celular</label>
        <div class="col-lg-4 checkbox">
            <input type="text" name="celular" class="form-control" value="<?=$productor['celular']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Email</label>
        <div class="col-lg-4 checkbox">
            <input type="text" name="email" class="form-control" value="<?=$productor['email']?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Contraseña</label>
        <div class="col-lg-4 checkbox">
            <input type="password" name="password" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Confirmar contraseña</label>
        <div class="col-lg-4 checkbox">
            <input type="password" name="passconf" class="form-control">
        </div>
    </div>
    
    <?php if($admin == 1) { ?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Observacion:</label>
        <div class="col-lg-4 checkbox">
            <textarea name="observacion" class="form-control"><?=$productor['observacion']?></textarea>
        </div>
    </div>
    <?php } ?>

    <div class="form-group">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <input type="submit" name="submit" id="submit" value="Actualizar" class="btn btn-primary">
        </div>
    </div>
    
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#nombre").focus();
    });
</script>