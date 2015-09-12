<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <p class="h3">Editar Compañía</p>
        <p class="h3">&nbsp;</p>

        <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Compañía</label>
            <div class="col-lg-4">
                <input name="compania" type="text" class="form-control" id="compania" value="<?=$compania['compania']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Persona de Contacto</label>
            <div class="col-lg-4">
                <input name="contacto" type="text" class="form-control" value="<?=$compania['contacto']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Dirección</label>
            <div class="col-lg-4">
                <input name="direccion" type="text" class="form-control" value="<?=$compania['direccion']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Teléfono</label>
            <div class="col-lg-4">
                <input name="telefono" type="text" class="form-control" value="<?=$compania['telefono']?>">
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-4">
                <input name="email" type="text" class="form-control" value="<?=$compania['email']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Observación:</label>
            <div class="col-lg-4">
                <textarea name="observacion" class="form-control"><?=$compania['observacion']?></textarea>
            </div>
        </div>


            </p>
            <p>&nbsp;</p>
            <div class="form-group">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <input type="submit" name="submit" id="submit" value="Actualizar" class="btn btn-primary">
                </div>
            </div>
            
            
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#compania").focus();
    });
</script>