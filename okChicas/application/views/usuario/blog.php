  <?php
      $datos = json_decode(file_get_contents('usu.txt'), 1);
      $email = $datos['correo'];
   ?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>okChicas</title>

      <meta charset="UTF-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Fuentes de Google -->
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
      <!-- Iconos -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

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
            <a class="navbar-brand" href="#">okChicas</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="#">blog</a></li>
            <li><a href="<?php echo base_url('blog/contacto'); ?>">contacto</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a ><span class="glyphicon glyphicon-user"></span><?php echo $email; ?></a></li>
            <li><a href="<?php echo base_url('usuario/salir'); ?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
          </ul>
        </div>
      </nav>

      <div id="comentario" class="row">
        <div class="col col-sm-6 col-sm-offset-3">
          <h4>Agregar un nuevo tema al blog</h4>
          <form method="post" action="">
            <div class="form-group input-group">
                <label class="input-group-addon">Comentario:</label>
                <textarea class="form-control" name="comentario"></textarea>
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-danger">Publicar</button>
                </div>
          </form>
        </div>
      </div>
      <!-- Contenedor Principal -->
<div class='comments-container'>
    <h1>Comentarios <a href="http://creaticode.com">creaticode.com</a></h1>
	<ul id="comments-list" class="comments-list">
	 <?php
	   	 $query= "select * from comentario";

               $CI =& get_instance();

               $rs = $CI->db->query($query);
                 $rs = $rs->result();

            	 foreach ($rs as $result)  {
              $sql = "select * from personas join comentario where personas.id = '".$result->id_usuario."'";
              $res = $CI->db->query($sql);
              $res = $res->result();
              foreach ($res as $key) {
}
		 echo "<li>
				<div class='comment-main-level'>
					<!-- Avatar -->
					<div class='comment-avatar'><img src='".base_url("fotos/{$result->id_usuario}.jpg")."'/> </div>
					<!-- Contenedor del Comentario -->
					<div class='comment-box'>
						<div class='comment-head'>
							<h6 class='comment-name by-author><a href=''</a></h6>
							<span>".$key->correo."</span>
							<i class='fa fa-reply'></i>
							<i class='fa fa-heart'></i>
						</div>
						<div class='comment-content'>".$result->comentario."</div>
					</div>
				</div>
			</li>";
			echo "<!-- Respuestas de los comentarios -->
            <ul class='comments-list reply-list'>";

			$sc = "select * from respuesta join comentario where respuesta.id_comentario= '".$result->id."'";

      $var = $CI->db->query($sc);

      $var = $var->result();
        # code...

			foreach ($var as $value){

        $sqly = "select * from personas join respuesta where personas.id = '".$value->id_usuario."'";
        $vari = $CI->db->query($sqly);
        $vari = $vari->result();
        foreach ($vari as $valor) {

        }
				echo "<li>
					<!-- Avatar -->
					<div class='comment-avatar'><img src='images/avatar_o.png' alt=''></div>
					<!-- Contenedor del Comentario -->
					<div class='comment-box'>
						<div class='comment-head'>
							<h6 class='comment-name'><a href=''></a></h6>
							<span>".$valor->correo."</span>
								<i class='fa fa-heart'></i>
						</div>
						<div class='comment-content'>".$valor->comentario."</div>
					</div>
				</li>";

    }
			echo "</ul>";

 }
	 ?>
	</ul>
</div>
        <div class="row">
          <div class="col col-sm-5 col-sm-offset-4">
            <form method="post" action="">
              <div class="form-group input-group">
                  <label class="input-group-addon">Respuesta:</label>
                  <textarea class="form-control" name="comentario"></textarea>
                  </div>
                  <div class="text-center">
                  <button type="submit" class="btn btn-danger">Publicar</button>
                  </div>
            </form>
          </div>
        </div>
      <style>
      body {
      	background-color: #CEF6F5;
      }
      #nav{
        height: 50px;
        background-color: red;
      }

      a{
        color: #fff;
      }

      * {
 	margin: 0;
 	padding: 0;
 	-webkit-box-sizing: border-box;
 	-moz-box-sizing: border-box;
 	box-sizing: border-box;
 }


ul {
	list-style-type: none;
}

body {
	font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
	background: #dee1e3;
}

/** ====================
 * Lista de Comentarios
 =======================*/
.comments-container {
	margin: 60px auto 15px;
	width: 768px;
}

.comments-container h1 {
	font-size: 36px;
	color: #283035;
	font-weight: 400;
}

.comments-container h1 a {
	font-size: 18px;
	font-weight: 700;
}

.comments-list {
	margin-top: 30px;
	position: relative;
}

#comentario{
  margin-top: 30px;
}
/**
 * Lineas / Detalles
 -----------------------*/
.comments-list:before {
	content: '';
	width: 2px;
	height: 100%;
	background: #c7cacb;
	position: absolute;
	left: 32px;
	top: 0;
}

.comments-list:after {
	content: '';
	position: absolute;
	background: #c7cacb;
	bottom: 0;
	left: 27px;
	width: 7px;
	height: 7px;
	border: 3px solid #dee1e3;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
}

.reply-list:before, .reply-list:after {display: none;}
.reply-list li:before {
	content: '';
	width: 60px;
	height: 2px;
	background: #c7cacb;
	position: absolute;
	top: 25px;
	left: -55px;
}


.comments-list li {
	margin-bottom: 15px;
	display: block;
	position: relative;
}

.comments-list li:after {
	content: '';
	display: block;
	clear: both;
	height: 0;
	width: 0;
}

.reply-list {
	padding-left: 88px;
	clear: both;
	margin-top: 15px;
}
/**
 * Avatar
 ---------------------------*/
.comments-list .comment-avatar {
	width: 65px;
	height: 65px;
	position: relative;
	z-index: 99;
	float: left;
	border: 3px solid #FFF;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	overflow: hidden;
}

.comments-list .comment-avatar img {
	width: 100%;
	height: 100%;
}

.reply-list .comment-avatar {
	width: 50px;
	height: 50px;
}

.comment-main-level:after {
	content: '';
	width: 0;
	height: 0;
	display: block;
	clear: both;
}
/**
 * Caja del Comentario
 ---------------------------*/
.comments-list .comment-box {
	width: 680px;
	float: right;
	position: relative;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	-moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	box-shadow: 0 1px 1px rgba(0,0,0,0.15);
}

.comments-list .comment-box:before, .comments-list .comment-box:after {
	content: '';
	height: 0;
	width: 0;
	position: absolute;
	display: block;
	border-width: 10px 12px 10px 0;
	border-style: solid;
	border-color: transparent #FCFCFC;
	top: 8px;
	left: -11px;
}

.comments-list .comment-box:before {
	border-width: 11px 13px 11px 0;
	border-color: transparent rgba(0,0,0,0.05);
	left: -12px;
}

.reply-list .comment-box {
	width: 610px;
}
.comment-box .comment-head {
	background: #FCFCFC;
	padding: 10px 12px;
	border-bottom: 1px solid #E5E5E5;
	overflow: hidden;
	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0;
}

.comment-box .comment-head i {
	float: right;
	margin-left: 14px;
	position: relative;
	top: 2px;
	color: #A6A6A6;
	cursor: pointer;
	-webkit-transition: color 0.3s ease;
	-o-transition: color 0.3s ease;
	transition: color 0.3s ease;
}

.comment-box .comment-head i:hover {
	color: #03658c;
}

.comment-box .comment-name {
	color: #283035;
	font-size: 14px;
	font-weight: 700;
	float: left;
	margin-right: 10px;
}

.comment-box .comment-name a {
	color: #283035;
}

.comment-box .comment-head span {
	float: left;
	color: #999;
	font-size: 13px;
	position: relative;
	top: 1px;
}

.comment-box .comment-content {
	background: #FFF;
	padding: 12px;
	font-size: 15px;
	color: #595959;
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
.comment-box .comment-name.by-author:after {
	content: 'autor';
	background: #03658c;
	color: #FFF;
	font-size: 12px;
	padding: 3px 5px;
	font-weight: 700;
	margin-left: 10px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

/** =====================
 * Responsive
 ========================*/
@media only screen and (max-width: 766px) {
	.comments-container {
		width: 480px;
	}

	.comments-list .comment-box {
		width: 390px;
	}

	.reply-list .comment-box {
		width: 320px;
	}
}
      </style>
      </body>

      </html>
