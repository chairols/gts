<div class="container col-sm-8">
    <form class="form-horizontal" method="post">
        <p class="h3">Agregar Asegurados</p>
        <p class="h3">&nbsp;</p>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-4">
                <input type="text" name="nombre" class="form-control" value="<?=$asegurado['nombre']?>" autofocus>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Apellido</label>
            <div class="col-lg-4">
                <input type="text" name="apellido" class="form-control" value="<?=$asegurado['apellido']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Teléfono</label>
            <div class="col-lg-4">
                <input type="text" name="telefono" class="form-control" value="<?=$asegurado['telefono']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Celular</label>
            <div class="col-lg-4">
                <input type="text" name="celular" class="form-control" value="<?=$asegurado['celular']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-4">
                <input type="email" name="email" class="form-control" value="<?=$asegurado['email']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Compañía</label>
            <div class="col-lg-4">
                <select name="compania" class="form-control">
                    <?php foreach($companias as $compania) { ?>
                    <option value="<?=$compania['idcompania']?>" <?=($compania['idcompania']==$asegurado['idcompania'])?"selected":""?>><?=$compania['compania']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Póliza</label>
            <div class="col-lg-4">
                <input type="text" name="poliza" class="form-control" value="<?=$asegurado['poliza']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Observaciones</label>
            <div class="col-lg-4">
                <textarea name="observaciones" class="form-control"><?=$asegurado['observaciones']?></textarea>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div align="left">
                <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>