<HTML>
<HEAD><TITLE>Consulta de Stock</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<h1>Consulta de Stock (comconstock.php)</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   
    Nombres de los productos <select name="producto"> 
        <?php
        $conn=conexion();
        $prod=verProductos($conn);
        foreach($prod as $row) {
            echo "<option value=".$row["id_producto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select> <br><br>
   
    <input type="submit" value="Mostrar Cantidad disponible" name="enviar" />
</form>
<br>

<a href="comprasWeb.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else if ($_SERVER["REQUEST_METHOD"]== "POST"){
   
    $id_producto=$_POST["producto"];

        $conn=conexion();
        $arrayCantidadDisponible=verStockDisponible($conn, $id_producto); //mostrar cantidad disponible
        var_dump($arrayCantidadDisponible);
        if(count($arrayCantidadDisponible)<=0){ //mejor ==0
            echo "ERROR. No se ha dado de alta el producto en ALMACENA. Es decir, no se encuenta almacenado en ningun almacen";
            $conn = null;
        }else{
            foreach($arrayCantidadDisponible as $row) {
                echo "Nombre del producto: " . $row["nombre"]. "  || Nº almacen: " . $row["num_almacen"]."  || id: " . $row["id_producto"]."  || Cantidad disponible: " . $row["cantidad"]. "<br>";
            }
            $conn = null;
        
        }
       
}
?>
</BODY>
</HTML>