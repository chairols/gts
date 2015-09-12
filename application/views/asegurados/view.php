<div class="container col-sm-9">
    <form class="form-horizontal" method="post">
        <p class="h3">Ver Asegurado</p>
        <p class="h3">&nbsp;</p>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-4">
                <input type="text" name="nombre" class="form-control" value="<?=$asegurado['nombre']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Apellido</label>
            <div class="col-lg-4">
                <input type="text" name="apellido" class="form-control" value="<?=$asegurado['apellido']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Teléfono</label>
            <div class="col-lg-4">
                <input type="text" name="telefono" class="form-control" value="<?=$asegurado['telefono']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Celular</label>
            <div class="col-lg-4">
                <input type="text" name="celular" class="form-control" value="<?=$asegurado['celular']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-4">
                <input type="email" name="email" class="form-control" value="<?=$asegurado['email']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Compañía</label>
            <div class="col-lg-4">
                <input type="text" name="compania" class="form-control" value="<?=$compania['compania']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Póliza</label>
            <div class="col-lg-4">
                <input type="text" name="poliza" class="form-control" value="<?=$asegurado['poliza']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Observaciones</label>
            <div class="col-lg-4">
                <textarea name="observaciones" class="form-control" disabled><?=$asegurado['observaciones']?></textarea>
            </div>
        </div>
        
    </form>
</div>