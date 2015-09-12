<div class="col-sm-8 form-horizontal">
<p class="h3">Ver Contacto</p>
<p class="h3">&nbsp;</p>

   
<div class="form-group">
    <label class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-4 checkbox">
        <?=$contacto['nombre']?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Apellido</label>
    <div class="col-lg-4 checkbox">
        <?=$contacto['apellido']?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Teléfono</label>
    <div class="col-lg-4 checkbox">
        <?=$contacto['telefono']?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Email</label>
    <div class="col-lg-4 checkbox">
        <?=$contacto['email']?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Celular</label>
    <div class="col-lg-4 checkbox">
        <?=$contacto['celular']?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Sector</label>
    <div class="col-lg-4 checkbox">
        <?=$contacto['sector']?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Compañía</label>
    <div class="col-lg-4 checkbox">
        <?=$contacto['compania']['compania']?>
    </div>
</div>

<?php if($contacto['adjunto'] != '') { ?>
<div class="form-group">
    <label class="col-lg-2 control-label">Adjunto</label>
    <div class="col-lg-4">
        <a href="/upload/contactos/<?=$contacto['adjunto']?>" target="_blank">
            <i class="glyphicon glyphicon-file"></i>
        </a>
    </div>
</div>
<?php } ?>

</div>
