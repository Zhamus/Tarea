<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a href="https://sourcecodester.com" class="navbar-brand">Roman</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Reporte de clientes</h3>
		<hr style="border-top:1px dotted #ccc;" />
		<div class="col-md-3">
			<form method="POST" action="add.php">
				<div class="form-group">
					<label>Nombre</label>
					<input class="form-control" type="text" name="firstname"/>
				</div>
				<div class="form-group">
					<label>Apellido</label>
					<input class="form-control" type="text" name="lastname"/>
				</div>
				<div class="form-group">
					<label>Calle</label> 
					<input class="form-control" type="text" name="address"/>
				</div>
				<div class="form-group">
					<button class="btn btn-primary form-control" type="submit" name="save">Guardar</button>
				</div>
			</form>
		</div>
		<div class="col-md-9">
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Calle</th>
						<th>Accines</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT * FROM `user`");
						$sql->execute();
						while($fetch = $sql->fetch()){
					?>
					<tr>
						<td><?php echo $fetch['firstname']?></td>
						<td><?php echo $fetch['lastname']?></td>
						<td><?php echo $fetch['address']?></td>
						<td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $fetch['user_id']?>">Editar</button> | <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $fetch['user_id']?>">Eliminar</a></td>
					</tr>
					
					<div class="modal fade" id="update<?php echo $fetch['user_id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<form method="POST" action="update.php">
									<div class="modal-header">
										<h3 class="modal-title">Actualizar cliente</h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<div class="form-group">
												<label>Nombre</label>
												<input class="form-control" type="text" value="<?php echo $fetch['firstname']?>" name="firstname"/>
												<input type="hidden" value="<?php echo $fetch['user_id']?>" name="user_id"/>
											</div>
											<div class="form-group">
												<label>Apellido</label>
												<input class="form-control" type="text" value="<?php echo $fetch['lastname']?>" name="lastname"/>
											</div>
											<div class="form-group">
												<label>Calle</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['address']?>" name="address"/>
											</div>
											<div class="form-group">
												<button class="btn btn-warning form-control" type="submit" name="update">Actualizar</button>
											</div>
										</div>	
									</div>	
									<br style="clear:both;"/>
									<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									</div>
								</form>
							</div>
						</div>
					</div>	
					
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>
</html>