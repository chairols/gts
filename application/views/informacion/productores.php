<div class="container col-sm-8">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <?=($admin==1)?"<th>Acción</th>":""?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productores as $productor) { ?>
            <?php if($productor['activo'] == 1) { ?>
            <tr>
                <td><?=$productor['idusuario']?></td>
                <td><a href="/productores/view/<?=$productor['idusuario']?>/"><?=$productor['apellido'].' '.$productor['nombre']?></a></td>
                <?php if($admin == 1) { ?>
                <td>
                    <a href="/productores/update/<?=$productor['idusuario']?>/"><button class="btn btn-primary btn-sm glyphicon glyphicon-edit"></button></a>
                    <a href="/productores/borrar/<?=$productor['idusuario']?>/"><button class="btn btn-primary btn-sm glyphicon glyphicon-remove"></button></a>
                </td>
                <?php } ?>
                
            </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>
