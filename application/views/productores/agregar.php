<div class="col-sm-8">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <p class="h3">Carga de Productor</p>
    <p class="h3">&nbsp;</p>

    <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nombre</label>
        <div class="col-lg-4">
            <input name="nombre" type="text" class="form-control" id="nombre" value="<?=set_value('nombre')?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Apellido</label>
        <div class="col-lg-4">
            <input name="apellido" type="text" class="form-control" value="<?=set_value('apellido')?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Dirección</label>
        <div class="col-lg-4">
            <input name="direccion" type="text" class="form-control" value="<?=set_value('direccion')?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Teléfono</label>
        <div class="col-lg-4">
            <input name="telefono" type="tel" class="form-control" value="<?=set_value('telefono')?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Celular</label>
        <div class="col-lg-4">
            <input name="celular" type="text" class="form-control" value="<?=set_value('celular')?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Email</label>
        <div class="col-lg-4">
            <input name="email" type="email" class="form-control" value="<?=set_value('email')?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Contraseña</label>
        <div class="col-lg-4">
            <input name="password" type="password" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Compañías</label>
        <div class="col-lg-4">
            <select multiple name="companias[]" class="chosen col-lg-12">
                <?php foreach($companias as $compania) { ?>
                <option value="<?=$compania['idcompania']?>"><?=$compania['compania']?></option>
                <?php } ?>
            </select>
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
            <input type="file" name="adjunto" class="form-control">
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#nombre").focus();
        $(".chosen").chosen();
    });
</script>