<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?=$pregunta['text']?>">
    <meta name="keywords" content="Preguntados, Trivia Crack, Respuestas, Truco">
    <title><?=$pregunta['text']?></title>

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
    
  </head>

  <body>
      
        <div class="container">
            
            <div class="text-center">
                <h1><?=$pregunta['text']?></h1>
            </div>
            
            <div class="text-center">
                <div class="<?=($pregunta['correct_answer']=='0')?"alert alert-success":"alert alert-danger"?>">
                    <?=$respuestas[0]['answer']?>
                </div>
            </div>
            
            <div class="text-center">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:inline-block;width:336px;height:280px"
                     data-ad-client="ca-pub-8618241994460769"
                     data-ad-slot="2422923730"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            
            <div class="text-center">
                <div class="<?=($pregunta['correct_answer']=='1')?"alert alert-success":"alert alert-danger"?>">
                    <?=$respuestas[1]['answer']?>
                </div>
            </div>

            <div class="text-center">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:inline-block;width:336px;height:280px"
                     data-ad-client="ca-pub-8618241994460769"
                     data-ad-slot="6853123337"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

            <div class="text-center">
                <div class="<?=($pregunta['correct_answer']=='2')?"alert alert-success":"alert alert-danger"?>">
                    <?=$respuestas[2]['answer']?>
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
            
            <div class="text-center">
                <div class="<?=($pregunta['correct_answer']=='3')?"alert alert-success":"alert alert-danger"?>">
                    <?=$respuestas[3]['answer']?>
                </div>
            </div>
            
            <div class="text-center">
                <h2>¿Sabes las respuestas a las siguientes preguntas?</h2>
            </div>
            
            <div class="text-center alert alert-info">
            <?php foreach($random as $rand) { ?>
                <?=$rand['text']?>
            <?php } ?> 
            </div>
            
            <div class="text-center alert alert-info">
                <h4><a href="/respuestas/categoria/<?=  strtolower($categoria)?>">Búscalas aquí !</a></h4>
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