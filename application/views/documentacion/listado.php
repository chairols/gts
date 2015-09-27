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
                <th>Fecha</th>
                <th>Asunto</th>
                <th>Productor</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($nuevas as $nueva) { ?>
            <tr>
                <td><a href="/documentacion/responder/<?=$nueva['iddocumentacion']?>/"><?=strtoupper(substr($nueva['operacion'], 0, 3)).'-'.$nueva['iddocumentacion']?></a></td>
                <td><?=strftime('%d-%m-%Y', strtotime($nueva['fecha_ingreso']))?></td>
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