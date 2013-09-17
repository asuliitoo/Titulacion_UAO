<html>
<head>
  <title> Estados </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditarCarreras.js"></script>

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
                  <th>Numero</th>
                  <th>Clave</th>
                  <th>Estado</th>                  
                  <th>Edicion</th>
                  <th>Eliminar</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  $sql="SELECT * FROM estado";
                  $result = $conexion->consulta($sql);
                  while ($estado = mysqli_fetch_array($result)){
                    $edo=$estado['id_estado'];
                    $form="form";
                    $form = $form.$edo;
                    
                    ECHO "<tr>
                          <td>$estado[numero]</td>
                          <td>$estado[clave]</td>
                          <td>$estado[estado]</td>
                          <td>
                              <input type='hidden' name='$edo' value='$edo' >
                              <input type = 'button' value='Editar' id='editaCarrera' onClick='checkEdit(".$edo.")' >      </td>

                          <td><input type='hidden' name='$edo' value='$edo'>
                              <input type = 'button' value='Eliminar' id='eliminaCarrera' onClick='checkDelete(".$edo.")'>  </td>
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
