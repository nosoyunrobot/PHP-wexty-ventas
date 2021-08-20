<?php
    require "../conexion.php";
    $id = $_GET["id"];
    $fac = "SELECT * FROM factura WHERE nofactura = '$id'";

?>

<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">ESTADO DE FACTURA</h1>
        <a href="ventas.php" class="btn btn-primary">regresar</a>

	</div>
	<div class="row">
		<div class="col-lg-12">
        <form action="procesar_update_anulado.php" method="post" >
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>Id</th>
							<th>Fecha</th>
							<th>Total</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require "../conexion.php";
						$query = mysqli_query($conexion, "SELECT nofactura, fecha,codcliente, totalfactura, estado FROM factura WHERE nofactura = '$id'");
						mysqli_close($conexion);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
						?>
								<tr>
									<td><input type="number" name="id" value="<?php echo $dato['nofactura'];?>"></td>
									<td><?php echo $dato['fecha']; ?></td>
									<td><?php echo $dato['totalfactura']; ?></td>
									<td><input name="editEstado" value="<?php echo $dato['estado']; ?>"></td>
									<td>
                                   <input type="submit" value="actualizar">
									</td>
								</tr>
						<?php }} ?>

					</tbody>
				</table>
               </form>
			</div>
		</div>
	</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>