<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <p class="h3">Editar Contactos Varios</p>
        <p class="h3">&nbsp;</p>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-4">
                <input type="text" name="nombre" class="form-control" value="<?=$contacto['nombre']?>" autofocus>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Apellido</label>
            <div class="col-lg-4">
                <input type="text" name="apellido" class="form-control" value="<?=$contacto['apellido']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Teléfono</label>
            <div class="col-lg-4">
                <input type="text" name="telefono" class="form-control" value="<?=$contacto['telefono']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Celular</label>
            <div class="col-lg-4">
                <input type="text" name="celular" class="form-control" value="<?=$contacto['celular']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-4">
                <input type="email" name="email" class="form-control" value="<?=$contacto['email']?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Observaciones</label>
            <div class="col-lg-4">
                <textarea name="observaciones" class="form-control"><?=$contacto['observaciones']?></textarea>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div align="left">
                <input type="submit" name="submit" value="Editar" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>