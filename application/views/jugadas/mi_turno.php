<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">

    <title>Respuestas Preguntados - Mi turno</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=3.1.1">


    <style type="text/css">
    body{
        padding-top: 20px;
    }

    ul li{
    margin-bottom: 0.71428571428571em;
    }
    .respuesta, .respuesta1, .respuesta2, .respuesta3, .respuesta4, .respuesta5, .respuesta6{
        font-weight: bold;
        font-size: 1.28571428571429em;
        border-radius: 3px;
        background-color: #3C763D;
        color: #fff;
        padding: 0.5em 0.4375em 0.8125em 0.4375em;
        position: relative;
    }
    .respuesta .badge, .respuesta1 .badge, .respuesta2 .badge, .respuesta3 .badge, .respuesta4 .badge, .respuesta5 .badge, .respuesta6 .badge{
        font-size: 18px;
        background-color: #fff;
        color: #3C763D;
        border-radius: 15px;
    }
    .cat_small{
        position: absolute;
        left: 0.72727272727273em;
        bottom: 2px;
        font-size: 11px;
        opacity: 0.7;
    }
    .resp{
        display: inline-block;
        text-overflow: ellipsis;
        max-width: 80%;
        white-space: nowrap;
        overflow:hidden !important;
    }

    .history{
        background-color: #EBD036;
    }
    .geography{
        background-color: #1575CF;
    }
    .arts{
        background-color: #F42731;
    }
    .sports{
        background-color: #FF9400;
    }
    .entertainment{
        background-color: #E643A0;
    }
    .science{
        background-color: #1FC868;
    }

    .history .badge{
        color: #EBD036;
    }
    .geography .badge{
        color: #1575CF;
    }
    .arts .badge{
        color: #F42731;
    }
    .sports .badge{
        color: #FF9400;
    }
    .entertainment .badge{
        color: #E643A0;
    }
    .science .badge{
        color: #1FC868;
    }


    .multi{
        font-size: 16px;
    }
    .multi .badge{
        font-size: 16px;
        margin-top: 5px;
    }
    </style>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>


    <div class="container">
        <div class="col-md-12">
            <a href="/jugadas/mi-turno/">
                <button type="button" class="btn btn-default glyphicon glyphicon-refresh"></button>
            </a>
            <a href="/usuarios/configurar/">
                <button type="button" class="btn btn-default glyphicon glyphicon-cog"></button>
            </a>
            <a href="/usuarios/logout/">
                <button type="button" class="btn btn-default glyphicon glyphicon-log-out"></button>
            </a>
            <a href="/pagos/comprar/">
                <button type="button" class="btn btn-default glyphicon glyphicon-usd"></button>
            </a>
            <img src="/assets/img/coins.png" height="20px" width="20px"> <?=$usuario['jugadas']?>
        
            <h3><span class="label label-success">Mi turno</span></h3>
            <?php
            $contador = 0;
            ?>
            <div class="list-group">
                <?php foreach($dashboard->list as $lista) {
                    if(($lista->game_status == 'ACTIVE' && $lista->my_turn == 1) || ($lista->game_status == 'PENDING_APPROVAL' && $lista->my_turn == 1)) { ?>
                        <a href="/jugadas/respuestas/<?=$lista->opponent->id?>" class="list-group-item"><?=(!isset($lista->opponent->facebook_name))?$lista->opponent->username:$lista->opponent->facebook_name?></a> 
                        <?php $contador++; ?>
           <?php    }
                }
           ?>         
            </div>
               
            <?php if($contador == 0) { ?>
                        <div class="alert alert-danger"><strong>No hay jugadas pendientes.</strong></div>
            <?php } ?>
       


<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/script.js"></script>
-->
</body>
</html>
