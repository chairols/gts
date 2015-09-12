<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <p class="h3">Carga de polizas enviadas</p>
        <p class="h3">&nbsp;</p>


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
            <label class="col-lg-2 control-label">Seccion</label>
            <div class="col-lg-4">
                <select name="select" id="select" class="form-control">
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Poliza</label>
            <div class="col-lg-4">
                <input name="textfield" type="text" class="form-control" id="textfield">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Endoso</label>
            <div class="col-lg-4">
                <input name="textfield2" type="text" class="form-control" id="textfield2">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Asegurado</label>
            <div class="col-lg-4">
                <input name="textfield3" type="text" class="form-control" id="textfield3">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Fecha de envio</label>
            <div class="col-lg-4">
                <input name="textfield3" type="text" class="form-control" id="textfield3">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Modo de envio</label>
            <div class="col-lg-4">
                <select name="select2" id="select2" class="form-control">
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Observacion:</label>
            <div class="col-lg-4">
                <textarea name="textarea" class="form-control" id="textarea"></textarea>
            </div>
        </div>


            </p>
            <p>&nbsp;</p>
        <div class="col-lg-4">
            <div align="left">
                <input type="submit" name="submit" id="submit" value="Enviar" class="btn btn-primary">
            </div>
        </div>

    </form>
</div>
