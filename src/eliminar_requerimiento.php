<?php
if (!empty($_GET['id'])) {
    require("../conexion.php");
    $idsolicitud = $_GET['id'];
    $query_delete = mysqli_query($conexion, "DELETE FROM solicitud_venta WHERE id_solicitud = $idsolicitud");
    mysqli_close($conexion);
    header("location: lista_requerimientos.php");
}
?>