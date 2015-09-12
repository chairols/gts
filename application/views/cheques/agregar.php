<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <p class="h3">Carga de Cheques</p>
        <p class="h3">&nbsp;</p>


        <div class="form-group">
            <label class="col-lg-2 control-label">Productor</label>
            <div class="col-lg-4">
                <select name="productor" class="form-control">
                    <?php foreach($productores as $productor) { ?>
                    <option value="<?=$productor['idproductor']?>"><?=$productor['apellido'].' '.$productor['nombre']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Compañia</label>
            <div class="col-lg-4">
                <select name="compania" class="form-control">
                    <?php foreach($companias as $compania) { ?>
                    <option value="<?=$compania['idcompania']?>"><?=$compania['compania']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
        <label class="col-lg-2 control-label">Cheque</label>
        <div class="col-lg-4">
          <input name="textfield5" type="text" class="form-control" id="textfield5">
        </div>
        </div>


        <div class="form-group">
        <label class="col-lg-2 control-label">Banco</label>
        <div class="col-lg-4">
          <input name="textfield2" type="text" class="form-control" id="textfield2">
        </div>
        </div>


        <div class="form-group">
        <label class="col-lg-2 control-label">Importe</label>
        <div class="col-lg-4">
          <input name="textfield2" type="text" class="form-control" id="textfield2">
        </div>
        </div>

        <div class="form-group">
        <label class="col-lg-2 control-label">Librante</label>
        <div class="col-lg-4">
          <input name="textfield2" type="text" class="form-control" id="textfield2">
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

            <div align="center"></div>
    </form>
</div>
