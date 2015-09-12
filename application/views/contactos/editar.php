<div class="col-sm-8">
    <form class="form-horizontal" method="post">
    <p class="h3">Cargar Contacto</p>
    <p class="h3">&nbsp;</p>

    <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>

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
        <label class="col-lg-2 control-label">Email</label>
        <div class="col-lg-4">
            <input type="text" name="email" class="form-control" value="<?=$contacto['email']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Celular</label>
        <div class="col-lg-4">
            <input type="text" name="celular" class="form-control" value="<?=$contacto['celular']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Sector</label>
        <div class="col-lg-4">
            <input type="text" name="sector" class="form-control" value="<?=$contacto['sector']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Compañía</label>
        <div class="col-lg-4">
            <select name="compania" class="form-control">
                <?php foreach($companias as $compania) { ?>
                <option value="<?=$compania['idcompania']?>" <?=($compania['idcompania']==$contacto['compania'])?"selected":""?>><?=$compania['compania']?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    </p>
        <p>&nbsp;</p>
        <div class="col-lg-4">
          <div align="left">
            <input type="submit" name="submit" id="submit" value="Modificar" class="btn btn-primary">
          </div>
        </div>

        <div align="center"></div>
    </form>
</div>
