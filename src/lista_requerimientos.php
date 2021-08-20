<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Bandeja de entrada</h1>
		<!-- <a href="registro_producto.php" class="btn btn-primary">...</a> -->
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-dark table-striped table-hover table-bordered" id="table">
					<thead class="thead-secondary">
						<tr>
							<th>ID SOLICITUD</th>
							<th>ID CLIENTE</th>
							<th>NOMBRE</th>
							<th>COD PRODUCTO</th>
							<th>DENO ARTICULO</th>
                            <th>UNIDAD</th>
                            <th>CANTIDAD</th>
                            <th>FECHA REQ.</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
							<th>ACCION</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT id_solicitud, codproducto , deno_articulo , unidad, cantidad ,s.idcliente, c.nombre ,fecha_requerimiento from solicitud_venta s INNER join cliente c on c.idcliente = s.idcliente ");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['id_solicitud']; ?></td>
									<td><?php echo $data['idcliente']; ?></td>
									<td><?php echo $data['nombre'];?></td>
									<td><?php echo $data['codproducto']; ?></td>
									<td><?php echo $data['deno_articulo']; ?></td>
                                    <td><?php echo $data['unidad'];?></td>
                                    <td><?php echo $data['cantidad'];?></td>
									<td><?php echo $data['fecha_requerimiento'];?></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
									<td>
                                    <form action="eliminar_requerimiento.php?id=<?php echo $data['id_solicitud']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit">Eliminar</button>
										</form>
									</td>
                                    <?php } ?>
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>