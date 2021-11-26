<?php
require_once 'inventario.model.php';

// Logica
$alm = new facturaEncabezado();
$model = new FacturaCRUD();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('id:factura', $_REQUEST['id_factura']);
			$alm->__SET('fecha', $_REQUEST['fecha']);
			$alm->__SET('telefono', $_REQUEST['telefono']);
			$alm->__SET('cliente', $_REQUEST['cliente']);


			$model->Actualizar($alm);
			header('Location: crudfacturas.php');
			break;

		case 'registrar':

			$alm->__SET('fecha', $_REQUEST['fecha']);
			$alm->__SET('telefono', $_REQUEST['telefono']);
			$alm->__SET('cliente', $_REQUEST['cliente']);


			$model->Registrar($alm);
			header('Location: crudfacturas.php');
			break;


	}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	
	
	
<title>Consulta</title>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
</head>

	<body style="padding:15px; " class="fondoDePantalla">

		<div class="contenedor">
			<div class="pure-g">
				<div class="pure-u-1-12">
					<form action="menu2.html"><button type="submit" name="consulta">Volver
					</button>
					</form>
					<table class="pure-table pure-table-horizontal">

						<thead>
							<tr>
								<th>Fecha</th>
								<th>Cliente</th>
								<th>Telefono</th>
							</tr>
						</thead>

						<?php foreach($model->Listar() as $r): ?>
							<tr>
								<td><?php echo $r->__GET('fecha'); ?></td>
								<td><?php echo $r->__GET('cliente'); ?></td>
								<td><?php echo $r->__GET('telefono'); ?></td>


							</tr>
						<?php endforeach; ?>

					</table>
				</div>
			</div>

		</div>
	</body>

</html>
