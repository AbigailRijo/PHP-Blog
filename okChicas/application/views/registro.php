<?php
     plantilla::inicio();

    $mensaje= "";


    $CI =& get_instance();
    if($_POST){
    $datos = [
        "nombre" => $_POST['nombre'],
        "correo" => $_POST['correo'],
        "contraseña" => $_POST['contraseña']
      ];
         echo '<script type="text/javascript">alert("Sus datos han sido registrados exitosamente");</script>';
         $CI->db->insert('personas', $datos);
         $cod = $this->db->insert_id();
         $foto = $_FILES['foto'];
         if($foto['error'] == 0){
         $tmp = "fotos/{$cod}.jpg";
         move_uploaded_file($foto['tmp_name'], $tmp);
         }
         redirect('usuario/entrar');


    }
?>

    <div id="form">
        <h3>Registro</h3>
        <form enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col col-sm-4">
              <div class="form-group input-group">
                 <span class="input-group-addon">Nombre usuario:</span>
                 <input type="text" required class="form-control" name="nombre"/>
             </div>
             <div class="form-group input-group">
                 <span class="input-group-addon">Correo:</span>
                 <input type="text"  required class="form-control" name="correo"/>
             </div>
             <div class="form-group input-group">
                 <span class="input-group-addon">contraseña:</span>
                 <input type="password" required class="form-control" name="contraseña"/>
             </div>
             <div class="form-group input-group">
               <label class="input-group-addon">Imagen:</label>
               <input required type="file" name="foto" class="form-control" />
             </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger">Registrar</button>
                </div>
            </div>
        </div>
        </form>
        <h3><?php echo $mensaje; ?></h3>
    </div>

<style>
      #form{
    margin-left: 75px;
    margin-top: 30px;
	border-radius: 6px;
}

#container{
  margin-left: 75px;
}

h3{
  margin-left: 130px;

}
    </style>
