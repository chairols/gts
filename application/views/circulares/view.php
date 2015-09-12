<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <p class="h3">Ver Circular</p>
        <p class="h3">&nbsp;</p>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Fecha</label>
            <div class="col-lg-4">
                <input name="fecha" type="text" id="fecha" class="form-control" value="<?=strftime('%d-%m-%Y', strtotime($circular['fecha']))?>" disabled>
            </div>
        </div>
            
        <div class="form-group">
            <label class="col-lg-2 control-label">Asunto</label>
            <div class="col-lg-4">
                <input type="text" name="asunto" class="form-control" value="<?=$circular['asunto']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Compañía</label>
            <div class="col-lg-4">
                <input type="text" name="compania" class="form-control" value="<?=$compania['compania']?>" disabled>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Texto</label>
            <div class="col-lg-4">
                <textarea name="texto" class="form-control" disabled><?=$circular['texto']?></textarea>
            </div>
        </div>
        
        
    </form>
</div>