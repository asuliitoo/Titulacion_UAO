<html>
<head>
  <title> Usuarios </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditarUsuario.js"></script>

    <style type="text/css">
    .visible{
      background-color:orange; 
      position:absolute;
      top:5%;
      left:5%;
      right:5%;
      width:auto;
      height: auto;
      z-index:+1;
    }

    .fondo{   
    position:absolute;
    top:0px;
    left:0px;
    width:100%;
    height:100%;
    background-color:black;
    /*IE*/
    filter: alpha(opacity=50);
    /*FireFox Opera*/
    opacity: .5;
    }
    </style>
</head>
<body>
  <?php 
    include_once('Clases/Conexion.php');
    $conexion = new Conexion();
  ?>
  <div> <input id="nueva" type = "button" value="Agregar" > </div>

  <div style="background:white">
    <table class="table table-hover table-condensed">
              <thead>
                <tr style = "font-weight: bold; background: black; color:white;">
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Edicion</th>
                  <th>Eliminar</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  $sql="SELECT * FROM usuario";
                  $result = $conexion->consulta($sql);

                  while ($usuario = mysqli_fetch_array($result)){
                    $user=$usuario['id_usurio'];
                    $form="form";
                    $form = $form.$user;

                    $sql2 = "SELECT nombre_rol FROM rol WHERE id_rol = '$usuario[fk_rol]'";
                    $res = $conexion->consulta($sql2);
                    $rol = mysqli_fetch_array($res);  

  
                    ECHO "<tr>
                          <td>$usuario[nombre_usuario]</td>
                          <td>$rol[nombre_rol]</td>
                          
                          <td>
                              <input type='hidden' name='$user' value='$user' >
                              <input type = 'button' value='Editar' id='editaUsuario' onClick='checkEdit(".$user.")' > </td>

                          <td><input type='hidden' name='$user' value='$user'>
                              <input type = 'button' value='Eliminar' id='eliminaUsuario' onClick='checkDelete(".$user.")'>  </td>
                      </tr>";
                  }
                ?>
              </tbody>
            </table>

     </div>

     <div id="window"></div>
     <div id="fondo"></div>
     <div id="aviso"></div>
</body>


</html>
