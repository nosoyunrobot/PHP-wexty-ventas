<?php
		require "../conexion.php";
        $nofactura = $_POST['id'];
        $estado = $_POST['editEstado'];
       
        $actualizar = "UPDATE factura set estado = $estado WHERE nofactura = '$nofactura'";
        $resultado = mysqli_query($conexion, $actualizar) or die ("problemas al conectar");;

        if($resultado){
                echo "<script>alert('Se actualizó el estado de factura');</script>";

        }
      
?>