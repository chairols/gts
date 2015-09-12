<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="/assets/chosen/chosen2.css" rel="stylesheet" media="screen">
<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/assets/DataTables-1.10.7/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
</head>

<body>
 <p>
<!-- Fixed navbar --><img src="/assets/imagenes/login/logo.png" width="330" height="100"  alt=""/></p>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="/home/">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cargar <b class="caret"></b></a>
              <ul class="dropdown-menu">
                    <li><a href="/cotizaciones/agregar">Cotizaciones</a></li>
                    <li><a href="/emisiones/agregar/">Emisiones</a></li>
                    <li><a href="/reclamos/agregar/">Reclamos</a></li>
                    <li><a href="/cobranzas/agregar/">Cobranzas</a></li>
                    <li><a href="/siniestros/agregar/">Siniestros</a></li>
                    <?php if($admin == 1) { ?>
                    <li><hr></li>
                    <li><a href="/asegurados/agregar/">Asegurados</a></li>
                    <li><a href="/circulares/agregar/">Circulares</a></li>
                    <li><a href="/companias/agregar/">Compañias</a></li>
                    <li><a href="/contactos/agregar/">Contactos Cia</a></li>
                    <li><a href="/contactos_varios/agregar/">Contactos Varios</a></li>
                    <li><a href="/productores/agregar/">Productores</a></li>
                    <?php } ?>
                    <!--<li><a href="/facturas/agregar/">Facturas</a></li>-->
                </ul>                
            </li>
            <li>
              <a href="/buscar/">Buscar</a>               
            </li>
            <li>
                <a href="/login/logout/">Salir</a>
            </li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
<p><!-- Placed at the end of the document so the pages load faster -->
      <script src="/assets/js/jquery.js"></script>
      <script src="/assets/dist/js/bootstrap.min.js"></script>
      <script src="/assets/chosen/chosen.jquery.js"></script>
      <script src="/assets/DataTables-1.10.7/media/js/jquery.dataTables.min.js"></script>
</p>
