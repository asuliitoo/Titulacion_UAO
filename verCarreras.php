<html>
<head>
  <title> Licenciaturas </title>
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
                  <th>Carrera</th>
                  <th>Identificador de Area</th>
                  <th>Identificador de Subarea</th>
                  <th>Identificador de Nivel</th>
                  <th>Consecutivo de la Carrera</th>
                  <th>Edicion</th>
                  <th>Eliminar</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  $sql="SELECT * FROM carrera";
                  $result = $conexion->consulta($sql);
                  while ($carrera = mysqli_fetch_array($result)){
                    $lic=$carrera['id_carrera'];
                    $form="form";
                    $form = $form.$lic;
                    
                    ECHO "<tr>
                          <td>$carrera[nombre_carrera]</td>
                          <td>$carrera[i_area]</td>
                          <td>$carrera[i_subArea]</td>
                          <td>$carrera[i_nivel]</td>
                          <td>$carrera[consecutivo]</td>
                          <td>
                              <input type='hidden' name='$lic' value='$lic' >
                              <input type = 'button' value='Editar' id='editaCarrera' onClick='checkEdit(".$lic.")' >      </td>

                          <td><input type='hidden' name='$lic' value='$lic'>
                              <input type = 'button' value='Eliminar' id='eliminaCarrera' onClick='checkDelete(".$lic.")'>  </td>
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
