<link rel="stylesheet" href="/assets/css/blitzer/jquery-ui-1.10.3.custom.min.css" />
<script src="/assets/js/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#fecha_ocurrencia" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#fecha_sello" ).datepicker({dateFormat: "yy-mm-dd"});
    });
</script>
<div class="col-sm-8">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <p class="h3">Carga de Siniestros</p>
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
        <label class="col-lg-2 control-label">Asunto</label>
        <div class="col-lg-4">
            <input name="asunto" type="text" class="form-control" value="<?=set_value('asunto')?>">
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
        <label class="col-lg-2 control-label">N° de Póliza</label>
        <div class="col-lg-4">
            <input name="poliza" type="text" class="form-control" value="<?=set_value('poliza')?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Tipo de Seguro</label>
        <div class="col-lg-4">
            <select name="tipo_seguro" class="form-control">
                <?php foreach($secciones as $seccion) { ?>
                <option value="<?=$seccion['idseccion']?>"><?=$seccion['seccion']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Tipo de Siniestro</label>
        <div class="col-lg-4">
            <input name="tipo_siniestro" type="text" class="form-control" value="<?=set_value('tipo_siniestro')?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">N° de Siniestro</label>
        <div class="col-lg-4">
            <input name="numero_siniestro" type="text" class="form-control" value="<?=set_value('numero_siniestro')?>">
        </div>
    </div>  

    <div class="form-group">
        <label class="col-lg-2 control-label">Fecha de Ocurrencia</label>
        <div class="col-lg-4">
            <input name="fecha_ocurrencia" id="fecha_ocurrencia" type="text" class="form-control" value="<?=set_value('fecha_ocurrencia')?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Fecha de Sello</label>
        <div class="col-lg-4">
            <input name="fecha_sello" id="fecha_sello" type="text" class="form-control" value="<?=set_value('fecha_sello')?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Adjunto</label>
        <div class="col-lg-4">
            <input name="adjunto" type="file" class="form-control" value="<?=set_value('adjunto')?>">
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
