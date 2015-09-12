<div class="container">
    <h1>Bienvenido <?=$session['nombre'].' '.$session['apellido']?></h1>
    <p>Usted tiene:</p>
    <p><a href="/emisiones/nuevas/"><?=$emisiones?> nuevas notificaciones de Emisiones</a></p>
    <p><a href="/cobranzas/nuevas/"><?=$cobranzas?> nuevas notificaciones de Cobranzas</a></p>
    <p><a href="/siniestros/nuevas/"><?=$siniestros?> nuevas notificaciones de Siniestros / Legales</a></p>
    <p><a href="/varios/nuevas/"><?=$varios?> nuevas notificaciones de Varios</a></p>
</div>