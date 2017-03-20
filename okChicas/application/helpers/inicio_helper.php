<?php


class plantilla
{

  static $instancia;

  static function inicio()
  {
    # code...
    self::$instancia = new plantilla();
  }

  function __construct()
  {
    ?>

    <!DOCTYPE html>
    <html>
    <head>
    	<title>okChicas</title>

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




    </head>
    <body>

      <nav id="nav">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url('blog'); ?>">okChicas</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('blog/blog'); ?>">blog</a></li>
            <li><a href="<?php echo base_url('blog/contacto'); ?>">contacto</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('blog/registro'); ?>"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
            <li><a href="<?php echo base_url('usuario/entrar'); ?>"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
          </ul>
        </div>
      </nav>

    <?php
  }

  function __destruct(){
?>

  <!-- /.container -->
  <style>
  body {
  	background-image: url(http://arcdn02.mundotkm.com/2015/02/labios-2.jpg);
  	background-repeat: no-repeat;
  	background-size: cover;
      background-attachment: fixed;
  }
  #nav{
    height: 50px;
    background-color: red;
  }

  a{
    color: #fff;
  }

  </style>
  </body>

  </html>
  <?php
}
}
?>
