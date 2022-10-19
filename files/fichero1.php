<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>DATOS ALUMNOS</title>

</head>

<body>

<h2>DATOS ALUMNOS</h2>



<?php
$myfile = fopen("alumnos1.txt", "a") or die("Unable to open file!");

// definir variables 
$nombre = $apellido1 = $apellido2 = $fnacimiento = $localidad = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = test_input($_POST["nombre"]);
	$txt=str_pad($nombre,39); 
  fwrite($myfile, $txt);

    $apellido1 = test_input($_POST["apellido1"]);
	   $apellido1=str_pad($apellido1,40);
    $txt=$apellido1;
	fwrite($myfile, $txt);
	
    $apellido2 = test_input($_POST["apellido2"]);
		  $apellido2=str_pad($apellido2,41);
    $txt=$apellido2;
	fwrite($myfile, $txt);
	
    $fnacimiento = test_input($_POST["fnacimiento"]);
		$fnacimiento=str_pad($fnacimiento,9);
    $txt=$fnacimiento;
	fwrite($myfile, $txt);
	
    $localidad = test_input($_POST["localidad"]);
		$localidad=str_pad($localidad,26);
    $txt=$localidad;
	fwrite($myfile, $txt."\n"); // "\n" es salto de linea en php
	
	//fwrite ($myfile, "\n"); //salto de linea en php
	
	fclose($myfile);
}



function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}

?>

</body>

</html>
