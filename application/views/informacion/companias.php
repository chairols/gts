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
            <?php foreach($companias as $compania) { ?>
            <tr>
                <td><?=$compania['idcompania']?></td>
                <td><a href="/companias/view/<?=$compania['idcompania']?>/"><?=$compania['compania']?></a></td>
                <?=($admin==1)?"<td><a href='/companias/update/".$compania['idcompania']."/'>Editar</a></td>":""?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>