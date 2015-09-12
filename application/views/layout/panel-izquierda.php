
<div class="col-sm-4">
    
    <ul class="list-group">
        <li class="list-group-item active"><strong>Panel de Cotizaciones</strong></li>
        <a href="/cotizaciones/nuevas/"><li class="list-group-item">Nuevas<div class="badge"><?=$cotizaciones['nuevas']?></div></li></a>
        <a href="/cotizaciones/pendientes/"><li class="list-group-item">Pendientes<div class="badge"><?=$cotizaciones['pendientes']?></div></li></a>
        <a href="/cotizaciones/abiertas/"><li class="list-group-item">Abiertas<div class="badge"><?=$cotizaciones['abiertas']?></div></li></a>
        <a href="/cotizaciones/cerradas/"><li class="list-group-item">Cerradas<div class="badge"><?=$cotizaciones['cerradas']?></div></li></a>
        <a href="/cotizaciones/todas/"><li class="list-group-item">Todas<div class="badge"><?=$cotizaciones['todas']?></div></li></a>
    </ul>
    
    <ul class="list-group">
        <li class="list-group-item active"><strong>Panel de Emisiones</strong></li>
        <a href="/emisiones/nuevas/"><li class="list-group-item">Nuevas<div class="badge"><?=$emisiones['nuevas']?></div></li></a>
        <a href="/emisiones/pendientes/"><li class="list-group-item">Pendientes<div class="badge"><?=$emisiones['pendientes']?></div></li></a>
        <a href="/emisiones/abiertas/"><li class="list-group-item">Abiertas<div class="badge"><?=$emisiones['abiertas']?></div></li></a>
        <a href="/emisiones/cerradas/"><li class="list-group-item">Cerradas<div class="badge"><?=$emisiones['cerradas']?></div></li></a>
        <a href="/emisiones/todas/"><li class="list-group-item">Todas<div class="badge"><?=$emisiones['todas']?></div></li></a>
    </ul>
    
    <ul class="list-group">
        <li class="list-group-item active"><strong>Panel de Reclamos</strong></li>
        <a href="/reclamos/nuevas/"><li class="list-group-item">Nuevas<div class="badge"><?=$reclamos['nuevas']?></div></li></a>
        <a href="/reclamos/pendientes/"><li class="list-group-item">Pendientes<div class="badge"><?=$reclamos['pendientes']?></div></li></a>
        <a href="/reclamos/abiertas/"><li class="list-group-item">Abiertas<div class="badge"><?=$reclamos['abiertas']?></div></li></a>
        <a href="/reclamos/cerradas/"><li class="list-group-item">Cerradas<div class="badge"><?=$reclamos['cerradas']?></div></li></a>
        <a href="/reclamos/todas/"><li class="list-group-item">Todas<div class="badge"><?=$reclamos['todas']?></div></li></a>
    </ul>
    
    <ul class="list-group">
        <li class="list-group-item active"><strong>Panel de Cobranzas</strong></li> 
        <a href="/cobranzas/nuevas/"><li class="list-group-item">Nuevas<div class="badge"><?=$cobranzas['nuevas']?></div></li></a>
        <a href="/cobranzas/pendientes/"><li class="list-group-item">Pendientes<div class="badge"><?=$cobranzas['pendientes']?></div></li></a>
        <a href="/cobranzas/abiertas/"><li class="list-group-item">Abiertas<div class="badge"><?=$cobranzas['abiertas']?></div></li></a>
        <a href="/cobranzas/cerradas/"><li class="list-group-item">Cerradas<div class="badge"><?=$cobranzas['cerradas']?></div></li></a>
        <a href="/cobranzas/todas/"><li class="list-group-item">Todas<div class="badge"><?=$cobranzas['todas']?></div></li></a>
    </ul>
    
    <ul class="list-group">
        <li class="list-group-item active"><strong>Panel de Siniestros / Legales</strong></li>
        <a href="/siniestros/nuevas/"><li class="list-group-item">Nuevas<div class="badge"><?=$siniestros['nuevas']?></div></li></a>
        <a href="/siniestros/pendientes/"><li class="list-group-item">Pendientes<div class="badge"><?=$siniestros['pendientes']?></div></li></a>
        <a href="/siniestros/abiertas/"><li class="list-group-item">Abiertas<div class="badge"><?=$siniestros['abiertas']?></div></li></a>
        <a href="/siniestros/cerradas/"><li class="list-group-item">Cerradas<div class="badge"><?=$siniestros['cerradas']?></div></li></a>
        <a href="/siniestros/todas/"><li class="list-group-item">Todas<div class="badge"><?=$siniestros['todas']?></div></li></a>
    </ul>
    
    <ul class="list-group">
        <li class="list-group-item active"><strong>Panel de Varios</strong></li>
        <a href="/varios/nuevas/"><li class="list-group-item">Nuevas<div class="badge"><?=$varios['nuevas']?></div></li></a>
        <a href="/varios/pendientes/"><li class="list-group-item">Pendientes<div class="badge"><?=$varios['pendientes']?></div></li></a>
        <a href="/varios/abiertas/"><li class="list-group-item">Abiertas<div class="badge"><?=$varios['abiertas']?></div></li></a>
        <a href="/varios/cerradas/"><li class="list-group-item">Cerradas<div class="badge"><?=$varios['cerradas']?></div></li></a>
        <a href="/varios/todas/"><li class="list-group-item">Todas<div class="badge"><?=$varios['todas']?></div></li></a>
    </ul>
    
    <ul class="list-group">
        <li class="list-group-item active"><strong>Panel de Información</strong></li>
        <?php if($admin == 1) { ?>
        <a href="/informacion/asegurados/"><li class="list-group-item">Asegurados<div class="badge"></div></li></a>
        <a href="/informacion/circulares/"><li class="list-group-item">Circulares<div class="badge"></div></li></a>
        <a href="/informacion/companias/"><li class="list-group-item">Compañías<div class="badge"></div></li></a>
        <a href="/informacion/contactos/"><li class="list-group-item">Contactos<div class="badge"></div></li></a>
        <a href="/informacion/contactos_varios/"><li class="list-group-item">Contactos Varios<div class="badge"></div></li></a>
        <a href="/informacion/productores/"><li class="list-group-item">Productores<div class="badge"></div></li></a>
        <?php } elseif($admin == 0) { ?>
        <a href="/productores/update/"><li class="list-group-item">Mis Datos</li></a>
        <?php } ?>
    </ul>

</div>