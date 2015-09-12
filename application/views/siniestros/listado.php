<link rel="stylesheet" type="text/css" href="/assets/DataTables-1.10.7/media/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="/assets/DataTables-1.10.7/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tabla").dataTable();
    });
</script>
<div class="col-sm-8">
    <table class="table table-bordered table-striped table-condensed" id="tabla">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Póliza</th>
                <th>Asunto</th>
                <th>N° de Siniestro</th>
                <th>Productor</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($nuevas as $nueva) { ?>
            <tr>
                <td><a href="/siniestros/responder/<?=$nueva['idsiniestro']?>/">SIN-<?=$nueva['idsiniestro']?></a></td>
                <td><?=$nueva['poliza']?></td>
                <td><?=$nueva['asunto']?></td>
                <td><?=$nueva['numero_siniestro']?></td>
                <td><a href="/productores/view/<?=$nueva['idusuario']?>/"><?=$nueva['nombre'].' '.$nueva['apellido']?></a></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
    
</div>