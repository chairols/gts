<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bienvenido a su Panel de Control</title>
<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/assets/css/signin.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
    <?php if($mensaje != '') { ?>
    <div class="text-center alert <?=$alerta?>"><?=$mensaje?></div>
    <?php } ?>
  <div class="form-signin">
    <p><img src="/assets/imagenes/login/logo.png" width="330" height="100"  alt=""/></p>
    <form method="post" class="h2">
      <p class="h3">Recuperar contraseña</p>
      <p>
          <input name="email" type="email" class="form-control" placeholder="Email" autofocus>
      </p>
    <p>
      <input name="submit" type="submit" class="btn btn-lg btn-primary btn-block" id="submit" value="Recuperar">
    </p>
    <p>
    <h5><a href="/login/">Ingresar</a></h5>
    </p>
    </form>
  </div>
</div>
</body>
</html>