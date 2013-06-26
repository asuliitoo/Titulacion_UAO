<?php

//conection
$con = mysqli_connect("localhost","root","","stitulacion");

	if(mysqli_connect_errno($con)){

		echo "Error al conectar a la base de datos" . mysqli_connect_error();
	}
//=======================================================================

/*//user passowrd
$var = "pass";

//user password + random string
$pass = $var."alksdfesdf";

//encriptacion de: password + random string
echo md5 ($pass);

*/


//$_POST["user"];



if ($_POST["pass"] != $_POST["pass2"])
{
	echo "Las contraseñas no coinciden";
}

else
{
	$pass = $_POST["pass"]."31.oXGH-341";	
	$passEn = md5 ($pass);

	$query = "INSERT INTO usurio (contraseña )
			  VALUES ('$passEn')";

	mysqli_query($con, $query);
}


?>