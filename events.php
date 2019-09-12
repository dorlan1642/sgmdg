<?php
	include './php/conexion.php';
	$resultado=$mysqli->query("select * from Events  order by created_at DESC")or die($mysqli->error);
	
	while ($fila=mysqli_fetch_array($resultado)){
		$arreglo[]=array('Id'=>$fila['id'],
			'Name'=>$fila['name'],
			"Resume"=>$fila['resume'],
			"Content"=>$fila['content'],
			"Url_img"=>$fila['url_img']
			);
    }
    
    

		
?>

<?php
include './partes/_header.php'
?>
<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Fecha de Nacimiento</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Id Sucursal</th>
						

					</tr>
					<tbody>
						<?php 
							include "./php/conexion.php";
							$resultado=$mysqli->query("select * from Events")or die ($mysqli->error);
								while ($fila= mysqli_fetch_array($resultado)) {

								
						 ?>
						<tr>
							
							<td><?php echo $fila['id']; ?></td>
							<td><?php echo $fila['name']; ?></td>
							<td><?php echo $fila['resume'] ?></td>
							<td><?php echo $fila['content']; ?></td>
							<td><?php echo $fila['url_img']; ?></td>
							
							<td> 
							 <a class="btn btn-primary"  href="./mod_caj.php?id_caj=<?php echo $fila['id_caj'] ?>"> Actualizar</a> 
								<button  class="btnEliminar btn btn-warning">
									eliminar
								</button>

								<div class="oculto" style="display: none;" >
									Desea Eliminar el registro?
									<a class="btn btn-danger " href="./php/eli-caj.php?id_caj=<?php echo $fila['id_caj'] ?>"
				  style="">
							si
							</a>
							<button class="btnNo btn btn-success">
								no
							</button>
								</div>

							</td>
						<?php 

							} 
						 ?>

						</tr>
					</tbody>
				</thead>
			</table>
            </div>
				</div>

			</div>
		</div>

        
<?php
include './partes/_footer.php'
?>