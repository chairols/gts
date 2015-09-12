<div class="col-md-8">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <p class="h3">Carga de Cobranzas</p>
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
            <label class="col-lg-2 control-label">Asunto</label>
            <div class="col-lg-4">
                <input type="text" name="asunto" class="form-control">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Observaciones</label>
            <div class="col-lg-4">
                <textarea name="observaciones" class="form-control"></textarea>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Adjunto</label>
            <div class="col-lg-4">
                <input type="file" name="adjunto" class="form-control">
            </div>
        </div>
        
        <p>&nbsp;</p>
        <div class="col-lg-4">
          <div align="left">
            <input type="submit" name="submit" id="submit" value="Enviar" class="btn btn-primary">
          </div>
        </div>
        
    </form>
</div>