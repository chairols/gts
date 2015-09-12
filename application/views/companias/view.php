<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <p class="h3">Ver Compañía</p>
        <p class="h3">&nbsp;</p>

        <div class="form-group">
            <label class="col-lg-2 control-label">Compañía</label>
            <div class="col-lg-4 checkbox">
                <?=$compania['compania']?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Persona de Contacto</label>
            <div class="col-lg-4 checkbox">
                <?=$compania['contacto']?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Dirección</label>
            <div class="col-lg-4 checkbox">
                <?=$compania['direccion']?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Teléfono</label>
            <div class="col-lg-4 checkbox">
                <?=$compania['telefono']?>
            </div>
        </div>


        <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-4 checkbox">
                <?=$compania['email']?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Observación:</label>
            <div class="col-lg-4 checkbox">
                <?=nl2br($compania['observacion'])?>
            </div>
        </div>
        
        <?php if($compania['adjunto'] != '') { ?>
        <div class="form-group">
            <label class="col-lg-2 control-label">Adjunto</label>
            <div class="col-lg-4 checkbox">
                <a href="/upload/companias/<?=$compania['adjunto']?>" target="_blank">
                    <i class="glyphicon glyphicon-file"></i>
                </a>
            </div>
        </div>
        <?php } ?>

    </form>
</div>