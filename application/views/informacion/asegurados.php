<div class="container col-sm-9">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Asegurado</th>
                <th>Compañía</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($asegurados as $asegurado) { ?>
            <tr>
                <td><a href="/asegurados/view/<?=$asegurado['idasegurado']?>"><?=$asegurado['nombre'].' '.$asegurado['apellido']?></a></td>
                <td><?=$asegurado['compania']?></td>
                <td><?=$asegurado['telefono']?></td>
                <td><?=$asegurado['celular']?></td>
                <td><?=$asegurado['email']?></td>
                <td><a href="/asegurados/editar/<?=$asegurado['idasegurado']?>/"><button type="button" class="btn btn-primary btn-sm glyphicon glyphicon-edit" title="Editar"></button></a> &nbsp; <a href="/asegurados/borrar/<?=$asegurado['idasegurado']?>"><button class="btn btn-primary btn-sm glyphicon glyphicon-remove" title="Eliminar"></button></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>