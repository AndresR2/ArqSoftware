<?php

require_once 'inventario.model.php';

// Logica
$alm = new inventario();
$model = new InventarioModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':

			$alm->__SET('id_producto', $_REQUEST['id_producto']);
			$alm->__SET('marca', $_REQUEST['marca']);
			$alm->__SET('producto', $_REQUEST['producto']);
			$alm->__SET('descripcion', $_REQUEST['descripcion']);
            $alm->__SET('idProveedor', $_REQUEST['idProveedor']);
            $alm->__SET('costo_unidad', $_REQUEST['costo_unidad']);
            $alm->__SET('cantidad', $_REQUEST['cantidad']);
			$alm->__SET('precioBruto', $_REQUEST['precioBruto']);
			$alm->__SET('precioVenta', $_REQUEST['precioVenta']);
            $alm->__SET('disponibilidad', $_REQUEST['disponibilidad']);

			$model->Actualizar($alm);
			header('Location: consultainventario.php');
			break;  

		case 'registrar':

            $alm->__SET('id_producto', $_REQUEST['id_producto']);
			$alm->__SET('marca', $_REQUEST['marca']);
			$alm->__SET('producto', $_REQUEST['producto']);
			$alm->__SET('descripcion', $_REQUEST['descripcion']);
            $alm->__SET('idProveedor', $_REQUEST['idProveedor']);
            $alm->__SET('costo_unidad', $_REQUEST['costo_unidad']);
            $alm->__SET('cantidad', $_REQUEST['cantidad']);
			$alm->__SET('precioBruto', $_REQUEST['precioBruto']);
			$alm->__SET('precioVenta', $_REQUEST['precioVenta']);
            $alm->__SET('disponibilidad', $_REQUEST['disponibilidad']);

			$model->Registrar($alm);
			header('Location: consultainventario.php');
			break;


	}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Consulta</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <style>
        button {background-color: #00363f; 
            border-radius: 8px;
            color: white; 
            padding: 15px 32px; 
            text-align: center; 
            text-decoration: none; 
            display: inline-block; 
            font-size: 16px; 
            margin: 4px 2px; 
            cursor: pointer;}
        body {
            background-image: url("images/fondo2.jpg");
        }
    </style>
</head>

<body style="padding:15px;">
<div class="pure-g">
<div class="pure-u-1-12">
	<form action="menuInventario.html"><button type="submit" name="volver">Volver</button>
        <table class="pure-table pure-table-horizontal">

            <thead>
                <tr>
                <th style="text-align:left;">marca</th>
                <th style="text-align:left;">producto</th>
                <th style="text-align:left;">descripcion</th>
                <th style="text-align:left;">idProveedor</th>
                <th style="text-align:left;">costoUnidad</th>
                <th style="text-align:left;">cantidad</th>
                <th style="text-align:left;">precioBruto</th>
                <th style="text-align:left;">PrecioVenta</th>
                <th style="text-align:left;">disponibilidad</th>
                </tr>
            </thead>

    <?php foreach($model->Listar() as $r): ?>
        <tr>
                <td><?php echo $r->__GET('marca'); ?></td>
                <td><?php echo $r->__GET('producto'); ?></td>
                <td><?php echo $r->__GET('descripcion'); ?></td>
                <td><?php echo $r->__GET('idProveedor'); ?></td>
                <td><?php echo $r->__GET('costo_unidad'); ?></td>
                <td><?php echo $r->__GET('cantidad'); ?></td>
                <td><?php echo $r->__GET('precioBruto'); ?></td>
                <td><?php echo $r->__GET('precioVenta'); ?></td>
                <td><?php echo $r->__GET('disponibilidad') == 1 ? 'Si' : 'No'; ?></td>
        </tr>
    </form>    
    <?php endforeach; ?>

</table>
</div>
</div>
</body>

</html>
