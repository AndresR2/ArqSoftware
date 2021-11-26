
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
			//$alm->__SET('id_factura', $_REQUEST['id_factura']);
			$alm->__SET('fecha', $_REQUEST['fecha']);
			$alm->__SET('cliente', $_REQUEST['cliente']);
			$alm->__SET('telefono', $_REQUEST['telefono']);
          

			$model->Actualizar($alm);
			header('Location: crudfacturas.php');
			break;

		case 'registrar':

			$alm->__SET('fecha', $_REQUEST['fecha']);
			$alm->__SET('cliente', $_REQUEST['cliente']);
			$alm->__SET('telefono', $_REQUEST['telefono']);
          

			$model->Registrar($alm);
			header('Location: crudfacturas.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id_factura']);
			header('Location: crudfacturas.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['id_factura']);
			break;
	}
}

?>


<!DOCTYPE html>

<html lang="es">
    
	<head class="fondoDePantalla">

    <style>
		
		th { text-align: left;}
		body {
            background-image: url("images/fondo2.jpg");}
        input {width: 80;}

	</style>

		<title>Inventario</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

    <div class="pure-g">
        <div class="pure-u-1-12">

            <form action="?action=<?php echo $alm->id_factura > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                <input type="hidden" name="id_factura" value="<?php echo $alm->__GET('id_factura'); ?>" />

                <table style="width:500px;">

                    <tr><th style="text-align:left;">Fecha</th><td><input type="date" name="fecha" value="<?php echo $alm->__GET('fecha'); ?>" style="width:100%;" /></td></tr>
                    <tr><th style="text-align:left;">Cliente</th><td><input type="text" name="cliente" value="<?php echo $alm->__GET('cliente'); ?>" style="width:100%;" /></td></tr>
                    <tr><th style="text-align:left;">Telefono</th><td><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td></tr>
                                        
                   
                    
                    </td>
                    </tr>
                    <td>
                    <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                    </td>
                    </tr>
                </table>
            </form>

            <form action="consultafacturas.php">
                <td>
                <button type="submit" class="pure-button pure-button-primary" name="consulta">Consulta</button>
                </td>
            </form>
            <form action="menu2.html">
                <br>
                <input type="submit" class="pure-button pure-button-primary" value="Volver" />
            </form>

                <br>
                <br>
                <br>
                <table class="pure-table pure-table-horizontal">

                    <thead>
                        <tr>
                            <th style="text-align:left;">Id factura</th>
                            <th style="text-align:left;">Cliente</th>
                            <th style="text-align:left;">Telefono</th>
                            <th style="text-align:left;">Fecha</th>
                            
                           
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                           	<td><?php echo $r->__GET('id_factura'); ?></td>
                           	<td><?php echo $r->__GET('fecha'); ?></td>
                           	<td><?php echo $r->__GET('cliente'); ?></td>
                           	<td><?php echo $r->__GET('telefono'); ?></td>
                            
                            <td>
                                <a href="?action=editar&id_factura=<?php echo $r->id_factura; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id_factura=<?php echo $r->id_factura; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>

            </div>
        </div>

    </body>
</html>
