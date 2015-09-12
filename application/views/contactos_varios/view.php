<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <p class="h3">Ver Contactos Varios</p>
        <p class="h3">&nbsp;</p>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-4">
                <input type="text" name="nombre" class="form-control" value="<?=$contacto['nombre']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Apellido</label>
            <div class="col-lg-4">
                <input type="text" name="apellido" class="form-control" value="<?=$contacto['apellido']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Teléfono</label>
            <div class="col-lg-4">
                <input type="text" name="telefono" class="form-control" value="<?=$contacto['telefono']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Celular</label>
            <div class="col-lg-4">
                <input type="text" name="celular" class="form-control" value="<?=$contacto['celular']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-4">
                <input type="email" name="email" class="form-control" value="<?=$contacto['email']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Observaciones</label>
            <div class="col-lg-4">
                <textarea name="observaciones" class="form-control" disabled><?=$contacto['observaciones']?></textarea>
            </div>
        </div>
        
    </form>
</div>