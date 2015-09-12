<div class="container col-sm-9">
    <table class="table table-bordered table-striped" id="tabla">
        <thead>
            <tr>
                <th>Contacto</th>
                <th>Compañía</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>Sector</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contactos as $contacto) { ?>
            <tr>
                <td><a href="/contactos/view/<?=$contacto['idcontacto']?>"><?=$contacto['nombre'].' '.$contacto['apellido']?></a></td>
                <td><?=$contacto['compania']['compania']?></td>
                <td><?=$contacto['telefono']?></td>
                <td><?=$contacto['celular']?></td>
                <td><?=$contacto['sector']?></td>
                <td><a href="/contactos/editar/<?=$contacto['idcontacto']?>/"><button type="button" class="btn btn-primary btn-sm glyphicon glyphicon-edit" title="Editar"></button></a> &nbsp; <a href="/contactos/borrar/<?=$contacto['idcontacto']?>"><button class="btn btn-primary btn-sm glyphicon glyphicon-remove" title="Eliminar"></button></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tabla").DataTable();
    });
</script>