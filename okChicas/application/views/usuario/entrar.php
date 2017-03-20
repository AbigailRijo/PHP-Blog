<?php

if ($_POST) {
  # code...
  $sql = "select * from personas where correo = ? and contraseña = ?";

  $CI =& get_instance();
  $correo = $_POST['correo'];
  $contraseña =  $_POST['contraseña'];
  $rs = $CI->db->query($sql, array($correo, $contraseña));

  $rs = $rs->result();
  foreach ($rs as $result) {
    # code...
    file_put_contents('usu.txt', json_encode($result));
  }
  if (count($rs)>0) {
    # code...
    $_SESSION['gale_user'] = $rs[0];
    redirect('usuario/blog');
  }else {
    # code...
   echo '<script type="text/javascript">alert("No pudimos verificar tus credenciales. Por favor, vuelve a verificar e inténtalo de nuevo.");</script>';
  }
}

  plantilla::inicio();

 ?>
 <div id="ingresar">
 <div class="row">
   <div class="col col-sm-4 col-sm-offset-4">
     <form method="post" action="">
       <h3 class="text-center">Ingresa al sistema</h3>
       <div class="form-group input-group">
         <label class="input-group-addon">E-mail:</label>
         <input type="text" name="correo" class="form-control"></input>
       </div>
       <div class="form-group input-group">
         <label class="input-group-addon">Contraseña:</label>
         <input type="password" name="contraseña" class="form-control"></input>
       </div>
       <div class="text-center">
         <button class="btn btn-danger">Ingresar</button>
       </div>
       <div style="color:red">
       </div>
     </form>
   </div>
 </div>
</div>
<style>
#ingresar{
  margin-top: 100px;
  height: 200px;
   background: rgba(246, 212, 227, 0.6);
}
</style>
