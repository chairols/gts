<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Expires" content="<?=$expires?> GMT">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Respuestas al juego Preguntados">
    <meta name="keywords" content="Preguntados, Trivia Crack, Respuestas, Truco">
    <title>Respuestas Preguntados - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css">

#column-left {
    
    float: left;
    position: fixed;
    min-height: 225px;
    margin-bottom: 10px;
    margin-right: 10px;
    overflow: hidden;
    text-align: center;
    width: 300px;
}

#central {
    float: right;
    margin-bottom: 10px;
    padding-left: 300px;
    
}

#central2 {
    padding-left: 200px;
}
</style>
  </head>

  <body>
      
      <div class="container">
          <div id="column-left">
                  
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:336px;height:280px"
                         data-ad-client="ca-pub-8618241994460769"
                         data-ad-slot="2422923730"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <br>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:336px;height:280px"
                         data-ad-client="ca-pub-8618241994460769"
                         data-ad-slot="6853123337"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                  
        </div>
          <div id="central">
            <div class="text-center">
                <a href="/usuarios/login/">
                    <img src="/assets/img/facebook-connect-button.png">
                </a>
            </div>
            <br>
            <div class="text-center">
                <h1><strong>Respuestas Preguntados</strong></h1>
            </div>
            <br>
            
            <div class="text-center">
                <div class="btn-group">
                    <a href="/respuestas/categoria/arte">
                        <button type="button" class="btn btn-default <?=($categoria=='arte')?"label-arte":""?>">ARTE</button>
                    </a>
                    <a href="/respuestas/categoria/ciencia">
                        <button type="button" class="btn btn-default <?=($categoria=='ciencia')?"label-ciencia":""?>">CIENCIA</button>
                    </a>
                    <a href="/respuestas/categoria/deportes">
                        <button type="button" class="btn btn-default <?=($categoria=='deportes')?"label-deportes":""?>">DEPORTES</button>
                    </a>
                    <a href="/respuestas/categoria/entretenimiento">
                        <button type="button" class="btn btn-default <?=($categoria=='entretenimiento')?"label-entretenimiento":""?>">ENTRETENIMIENTO</button>
                    </a>
                    <a href="/respuestas/categoria/geografia">
                        <button type="button" class="btn btn-default <?=($categoria=='geografia')?"label-geografia":""?>">GEOGRAFIA</button>
                    </a>
                    <a href="/respuestas/categoria/historia">
                        <button type="button" class="btn btn-default <?=($categoria=='historia')?"label-historia":""?>">HISTORIA</button>
                    </a>
                </div>
            </div>

            <div class="text-center">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:inline-block;width:336px;height:280px"
                     data-ad-client="ca-pub-8618241994460769"
                     data-ad-slot="9806589739"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

            <div class="row">

                <div id="central2" class="text-right">

                      <?php
                      foreach($preguntas as $pregunta) { ?>
                            <p class="bg-warning"><a href="/respuestas/pregunta/<?=$pregunta['idpreguntas']?>/<?=$pregunta['url_amigable']?>"><?=$pregunta['text']?></a></p>
                      
                      <?php } ?>

                </div>
                
            </div>

        </div>
      </div>
  </body>
</html>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50790812-1', 'respuestas-preguntados.com');
  ga('send', 'pageview');

</script>