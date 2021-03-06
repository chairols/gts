<div class="col-sm-8">
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Compañía</th>
                <th>Asunto</th>
                <th>Productor</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($nuevas as $nueva) { ?>
            <tr>
                <td><a href="/reclamos/responder/<?=$nueva['idreclamo']?>/">REC-<?=$nueva['idreclamo']?></a></td>
                <td><?=$nueva['compania']['compania']?></td>
                <td><?=$nueva['asunto']?></td>
                <td><a href="/productores/view/<?=$nueva['idusuario']?>/"><?=$nueva['nombre'].' '.$nueva['apellido']?></a></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
    
    <ul class="pagination">
        <?php foreach($paginacion as $key => $value) { ?>
        <li><a href="<?=$value?>"><?=$key?></a></li>
        <?php } ?>
    </ul>
</div>