<div class="container col-sm-9">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contactos as $contacto) { ?>
            <tr>
                <td><a href="/contactos_varios/view/<?=$contacto['idcontactos_varios']?>"><?=$contacto['nombre'].' '.$contacto['apellido']?></a></td>
                <td><?=$contacto['telefono']?></td>
                <td><?=$contacto['celular']?></td>
                <td><?=$contacto['email']?></td>
                <td><?=$contacto['observaciones']?></td>
                <td><a href="/contactos_varios/editar/<?=$contacto['idcontactos_varios']?>">Editar</a> | <a href="/contactos_varios/borrar/<?=$contacto['idcontactos_varios']?>">Borrar </a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>