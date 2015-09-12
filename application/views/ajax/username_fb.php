<!--<div class="row">
    <div class="col-md-4">
        <img src="<?=$graph->picture->data->url?>"/><br>
        <label><?=$graph->name?></label><br>
        <label><?=$graph->id?></label><br>
        <label><?=$graph->username?></label>
    </div>
    
    <div class="col-md-4 col-md-offset-4">
        <label>id: <?=$preguntados->list[0]->id?></label><br>
        <label>username: <?=$preguntados->list[0]->username?></label><br>
        <label>facebook_id: <?=$preguntados->list[0]->facebook_id?></label><br>
        <label>facebook_name: <?=$preguntados->list[0]->facebook_name?></label><br>
    </div>
</div>
-->
<div class="form-group text-left">
    <label>Id de Facebook</label>
<?php if(isset($graph->id)) { ?>
    <span class="glyphicon glyphicon-ok-circle"></span>
    <input name="facebook_id_real" type="hidden" class="form-control" value="<?=$graph->id?>" disabled>
<?php } else { ?>
    <span class="glyphicon glyphicon-remove-circle"></span>
    <input name="facebook_id_real" type="text" class="form-control">
<?php } ?>
</div>

<div class="form-group text-left">
    <label>Id de Preguntados</label>
<?php if(isset($preguntados->list[0]->id)) { ?>
    <span class="glyphicon glyphicon-ok-circle"></span>
    <input name="idpreguntados" type="hidden" class="form-control" value="<?=$preguntados->list[0]->id?>" disabled>
<?php } else { ?>
    <span class="glyphicon glyphicon-remove-circle"></span>
    <input name="idpreguntados" type="text" class="form-control">
<?php } ?>
</div>

<div class="form-group text-left">
    <label>Usuario de Preguntados</label>
<?php if(isset($preguntados->list[0]->username)) { ?>
    <span class="glyphicon glyphicon-ok-circle"></span>
    <input name="username_preg" type="hidden" class="form-control" value="<?=$preguntados->list[0]->username?>" disabled>
<?php } else { ?>
    <span class="glyphicon glyphicon-remove-circle"></span>
    <input name="username_preg" type="text" class="form-control">
<?php } ?>
</div>

<?php if(isset($graph->id) && isset($preguntados->list[0]->id) && isset($preguntados->list[0]->username)) { ?>
<div class="form-group text-left">
    <button type="submit" class="btn btn-primary">Actualizar</button>
</div>
<?php } ?>
