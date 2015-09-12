<div class="col-sm-8">
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Fecha</th>
                <th>Tipo de Operación</th>
                <th>Productor</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($nuevas as $nueva) { ?>
            <tr>
                <td><a href="/documentacion/responder/<?=$nueva['iddocumentacion']?>/"><?=strtoupper(substr($nueva['operacion'], 0, 3)).'-'.$nueva['iddocumentacion']?></a></td>
                <td><?=$nueva['fecha_ingreso']?></td>
                <td><?=$nueva['operacion']?></td>
                <td><?=$nueva['nombre'].' '.$nueva['apellido']?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>