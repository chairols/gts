<div class="col-sm-8">
    <form class="form-horizontal" method="post">
    <p class="h3">Carga de Reclamos</p>
    <p class="h3">&nbsp;</p>

    <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
    
    
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
        <label class="col-lg-2 control-label">Asunto</label>
        <div class="col-lg-4">
            <input name="asunto" type="text" class="form-control" value="<?=set_value('asunto')?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Reclamo</label>
        <div class="col-lg-4">
            <textarea name="reclamo" class="form-control"><?=set_value('reclamo');?></textarea>
        </div>
    </div>  

        </p>
        <p>&nbsp;</p>
        <div class="col-lg-4">
          <div align="left">
            <input type="submit" name="submit" id="submit" value="Agregar" class="btn btn-primary">
          </div>
        </div>

        <div align="center"></div>
    </form>
</div>
