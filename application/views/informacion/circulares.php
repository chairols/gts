<div class="container col-sm-9">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Asunto</th>
                <th>Compañia</th>
                <th>Texto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($circulares as $circular) { ?>
            <tr>
                <td><?=strftime('%d-%m-%Y', strtotime($circular['fecha']))?></a></td>
                <td><a href="/circulares/view/<?=$circular['idcircular']?>"><?=$circular['asunto']?></a></td>
                <td><?=$circular['compania']?></td>
                <td><?=$circular['texto']?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>