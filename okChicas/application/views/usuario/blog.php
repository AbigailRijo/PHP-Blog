  <?php
      $datos = json_decode(file_get_contents('usu.txt'), 1);
      $email = $datos['correo'];


     if ($_POST) {
       # code...
      $dat = $_POST;

       if (isset($dat['comentario'])){
         # code...
       echo "comente";
        $comentario =  $dat['comentario'];
        $id_usuario = $datos['id'];

       $CI =& get_instance();
       $miSql = "insert into comentario(id_usuario, comentario) values ($id_usuario , '$comentario')";
       $rs = $CI->db->query($miSql);

       $cod = $this->db->insert_id();
       $foto = $_FILES['foto'];

       if($foto['error'] == 0){
       $tmp = "publicaciones/{$cod}.jpg";
       move_uploaded_file($foto['tmp_name'], $tmp);
     }
       //$rs = $rs->result();
     }else{
       echo "respondi";
        $respuesta =  $dat['respuesta'];
        $id_usuario = $datos['id'];
        $id_comentario = $dat['id_comentario'];
       $CI =& get_instance();
       //$miSql = "insert into respuesta(id_comentario, id_usuario, respuesta) values ($id_comentario, $id_usuario , '$respuesta')";

       $resp = new stdClass();
       $resp->id_comentario = $id_comentario;
       $resp->id_usuario = $id_usuario;
       $resp->respuesta = $respuesta;
       $CI->db->insert('respuesta',$resp);

       //$rs = $CI->db->query($miSql);

     }
     }

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

      <style>
             .thumb {
               height: 300px;
               border: 1px solid #000;
               margin: 10px 5px 0 0;
             }
           </style>

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
            <li><a ><span class="glyphicon glyphicon-user"></span>  <?php echo $email; ?>   </a></li>
            <li><a href="<?php echo base_url('usuario/salir'); ?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
          </ul>
        </div>
      </nav>

      <div id="comentario" class="row">
        <div class="col col-sm-6 col-sm-offset-3">
          <h4>Agregar un nuevo tema al blog</h4>
          <form enctype="multipart/form-data" method="post" action="">
                <textarea class="form-control" name="comentario"></textarea>
                <input type="file" id="files" name="foto" />
                <div class="text-center">
                <button type="submit" class="pull-right btn-danger">Publicar</button>
                </div>
              <br />
              <output id="list"></output>
          </form>
        </div>
      </div>
      <!-- Contenedor Principal -->
<div class='comments-container'>
    <h1>Comentarios</h1>
	<ul id="comments-list" class="comments-list">
	 <?php
	   	 $query= "select *, comentario.id as comentarioID  from comentario left join personas on comentario.id_usuario = personas.id";

               $CI =& get_instance();

               $rs = $CI->db->query($query);
                 $comentarios = $rs->result();

            	 foreach ($comentarios as $comentario)  {

                  // $variable = base_url('publicaciones/{$comentario->comentarioID}.jpg')
                if(base_url('publicaciones/{$comentario->comentarioID}.jpg')){
                     $variable = "<img  src='".base_url("publicaciones/{$comentario->comentarioID}.jpg")."'/>.";
                   }else{
                     $variable= "";
                   }


		 echo "<li>
				<div class='comment-main-level'>
					<!-- Avatar -->
					<div class='comment-avatar'><img src='".base_url("fotos/{$comentario->id_usuario}.jpg")."'/> </div>
					<!-- Contenedor del Comentario -->
					<div class='comment-box'>
						<div class='comment-head'>
							<h6 class='comment-name by-author><a href=''</a></h6>
							<span>".$comentario->correo."</span>
							<i class='fa fa-reply'></i>
							<i class='fa fa-heart'></i>
						</div>
						<div class='comment-content'>".$comentario->comentario."<br/><br/>".$variable."</div>
					</div>
				</div>
			</li>";
			echo "<!-- Respuestas de los comentarios -->
            <ul class='comments-list reply-list'>";

			$sc = "select * from respuesta left join personas on respuesta.id_usuario = personas.id where respuesta.id_comentario= '".$comentario->comentarioID."'";

      $var = $CI->db->query($sc);

      $respuestas = $var->result();
        # code...

			foreach ($respuestas as $respuesta){


				echo "<li>
					<!-- Avatar -->
					<div class='comment-avatar'><img src='".base_url("fotos/{$respuesta->id_usuario}.jpg")."'/> </div>
					<!-- Contenedor del Comentario -->
					<div class='comment-box'>
						<div class='comment-head'>
							<h6 class='comment-name'><a href=''></a></h6>
							<span>".$respuesta->correo."</span>
								<i class='fa fa-heart'></i>
						</div>
						<div class='comment-content'>".$respuesta->respuesta."</div>
					</div>
				</li>";

    }
			echo "</ul>
      <div class='row'>
          <div class='col col-sm-9 col-sm-offset-3'>
            <form method='post' action=''>
                  <input type='hidden' value='".$comentario->comentarioID."' name= 'id_comentario'></input>
                  <textarea placeholder= 'responer esta conversacion...' class='form-control' name='respuesta'></textarea>
                  <div class='text-center'>
                  <button type='submit' class='pull-right btn btn-danger'>Responder</button>
                  </div>
            </form>
          </div>
        </div>
     <br>
        ";

 }
	 ?>
	</ul>
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
img{
  width: 200px;
}

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

      <script>
             function archivo(evt) {
                 var files = evt.target.files; // FileList object

                 // Obtenemos la imagen del campo "file".
                 for (var i = 0, f; f = files[i]; i++) {
                   //Solo admitimos imágenes.
                   if (!f.type.match('image.*')) {
                       continue;
                   }

                   var reader = new FileReader();

                   reader.onload = (function(theFile) {
                       return function(e) {
                         // Insertamos la imagen
                        document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                       };
                   })(f);

                   reader.readAsDataURL(f);
                 }
             }

             document.getElementById('files').addEventListener('change', archivo, false);
     </script>
      </body>

      </html>
