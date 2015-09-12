<link rel="stylesheet" href="/assets/css/blitzer/jquery-ui-1.10.3.custom.min.css" />
<script src="/assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="/assets/ckeditor/ckeditor.js"></script>
<script>
    $(function() {
        $( "#fecha" ).datepicker({
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#fecha" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        
        CKEDITOR.replace ("editor1");
    });
</script>
<div class="row">
<div class="col-sm-8">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <p class="h3">Agregar Circulares</p>
        <p class="h3">&nbsp;</p>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Fecha</label>
            <div class="col-lg-4">
                <input name="fecha" type="text" id="fecha" class="form-control">
            </div>
        </div>
            
        <div class="form-group">
            <label class="col-lg-2 control-label">Asunto</label>
            <div class="col-lg-4">
                <input type="text" name="asunto" class="form-control">
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
            <label class="col-lg-2 control-label">Adjunto</label>
            <div class="col-lg-4">
                <input type="file" name="adjunto" class="form-control">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Texto</label>
            <div class="col-lg-10">
                <textarea cols="80" id="editor1" name="texto" rows="10"></textarea>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div align="left">
                <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
</div>