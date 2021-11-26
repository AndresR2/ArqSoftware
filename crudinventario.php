
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
			header('Location: crudinventario.php');
			break;

		case 'registrar':

            $alm->__SET('id_producto', $_REQUEST['id_producto']);/////////
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
			header('Location: crudinventario.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id_producto']);
			header('Location: crudinventario.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['id_producto']);
			break;
	}
}

?>


<!DOCTYPE html>
<html lang="es">
	<head>
        <style>
            body {
            background-image: url("images/fondo2.jpg");}
            th   {text-align:left;}
            input {width: 80;}
            th {text-align: left;}
            
            
        </style>

		<title>Control Inventario</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:20px;">

    <div class="pure-g">
        <div class="pure-u-1-12">

            <table><tr><th>
                    <form action="menuInventario.html">
                        <input type="submit" class="pure-button pure-button-primary" value="Volver" />
                    </form>
            </th></tr></table>

            <form action="?action=<?php echo $alm->id_producto > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                <input type="hidden" name="id_producto" value="<?php echo $alm->__GET('id_producto'); ?>" />

                <table style="width:500px; padding: 15px;">
                    <tr><th>Marca</th><td><input type="text" placeholder="Marca" name="marca" value="<?php echo $alm->__GET('marca'); ?>"/></td></tr>
                    <tr><th>Producto</th><td><input type="text" placeholder="Producto" name="producto" value="<?php echo $alm->__GET('producto'); ?>"/></td></tr>
                    <tr><th>Descripcion</th><td><input type="text" placeholder="Descripción" name="descripcion" value="<?php echo $alm->__GET('descripcion'); ?>"/></td></tr>
                    <tr><th>Proveedor</th><td><input type="text" placeholder="Proveedor" name="idProveedor" value="<?php echo $alm->__GET('idProveedor'); ?>"/></td></tr>
                    <tr><th>Costo Unidad</th><td><input type="text" placeholder="Costo Unidad" name="costo_unidad" value="<?php echo $alm->__GET('costo_unidad'); ?>"/></td></tr>
                    <tr><th>Cantidad</th><td><input type="text" placeholder="Cantidad" name="cantidad" value="<?php echo $alm->__GET('cantidad'); ?>"/></td></tr>
                    <tr><th>Precio Bruto</th><td><input type="text" placeholder="Precio de compra" name="precioBruto" value="<?php echo $alm->__GET('precioBruto'); ?>"/></td></tr>
                    <tr><th>Precio Venta Unidad</th><td><input type="text" placeholder="Precio de venta"name="precioVenta" value="<?php echo $alm->__GET('precioVenta'); ?>"/></td></tr>
                    <tr>
                        <th style="text-align:left;">Disponibilidad</th>
                    <td>
                    <select name="disponibilidad">
                        <option value="1" <?php echo $alm->__GET('disponibilidad') == 1 ? 'selected' :''; ?>>Si</option>
                        <option value="2" <?php echo $alm->__GET('disponibilidad') == 2 ? 'selected' :''; ?>>No</option>
                    </select>
                    </td>
                    <tr><td>
                    <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                    </td></tr>
                </table>
            </form>
                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th>id_producto</th>
                            <th>marca</th>
                            <th>producto</th>
                            <th>descripcion</th>
                            <th>idProveedor</th>
                            <th>costoUnidad</th>
                            <th>cantidad</th>
                            <th>precioBruto</th>
                            <th>precioVenta</th>
                            <th>disponibilidad</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('id_producto'); ?></td>
                           	<td><?php echo $r->__GET('marca'); ?></td>
                           	<td><?php echo $r->__GET('producto'); ?></td>
                           	<td><?php echo $r->__GET('descripcion'); ?></td>
                            <td><?php echo $r->__GET('idProveedor'); ?></td>
                           	<td><?php echo $r->__GET('costo_unidad'); ?></td>
                            <td><?php echo $r->__GET('cantidad'); ?></td>
	                        <td><?php echo $r->__GET('precioBruto'); ?></td>
	                        <td><?php echo $r->__GET('precioVenta'); ?></td>
                            <td><?php echo $r->__GET('disponibilidad') == 1 ? 'Si' : 'No'; ?></td>
                            <td>
                                <a href="?action=editar&id_producto=<?php echo $r->id_producto; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id_producto=<?php echo $r->id_producto; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>

            </div>
        </div>

    </body>
</html>
