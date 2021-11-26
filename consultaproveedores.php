<?php

require_once 'inventario.model.php';

// Logica
$alm = new proveedor();
$model = new ProveedorCRUD();

if(isset($_REQUEST['action'])){
	
    switch($_REQUEST['action']){
		
        case 'actualizar':
			$alm->__SET('idProveedor', $_REQUEST['idProveedor']);
			$alm->__SET('nombre', $_REQUEST['nombre']);
			$alm->__SET('telefono', $_REQUEST['telefono']);
			$alm->__SET('correo', $_REQUEST['correo']);

			$model->Actualizar($alm);
			header('Location: consultaproveedores.php');
			break;

		case 'registrar':

            $alm->__SET('idProveedor', $_REQUEST['idProveedor']);
			$alm->__SET('nombre', $_REQUEST['nombre']);
			$alm->__SET('telefono', $_REQUEST['telefono']);
			$alm->__SET('correo', $_REQUEST['correo']);

			$model->Registrar($alm);
			header('Location: consultaproveedores.php');
			break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idProveedor']);
            header('Location: consultaproveedores.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idProveedor']);
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
            input {width: 80;}
            th {text-align: left;}
            
            
    </style>
    <title>Consulta</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
        <body style="padding:15px;">
            <div class="pure-g">
                <div class="pure-u-1-12">
                    
            <table><tr><th>
                    <form action="menuInventario.html">
                        <input type="submit" class="pure-button pure-button-primary" value="Volver" />
                    </form>
            </th></tr></table>
        <div>
            <form action="?action=<?php echo $alm->idProveedor > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                <input type="hidden" name="idProveedor" value="<?php echo $alm->__GET('idProveedor'); ?>" />

                <table style="width:500px; padding: 15px;">
                <tr>  
                    <tr><th>nombre</th><td><input type="text" placeholder="Nombre Proveedor" name="nombre" value="<?php echo $alm->__GET('nombre'); ?>"/></td></tr>
                    <tr><th>telefono</th><td><input type="text" placeholder="Telefono" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>"/></td></tr>
                    <tr><th>correo</th><td><input type="text" placeholder="Correo" name="correo" value="<?php echo $alm->__GET('correo'); ?>"/></td></tr>
                <tr>
                    <td>
                    <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                    </td>
                </tr>
                </table>
            </form>
                    <table class="pure-table pure-table-horizontal">
                        <thead>
                            <tr>

                                <th>nombre</th>
                                <th>telefono</th>
                                <th>correo</th>
                            </tr>
                        </thead>
                        <?php foreach($model->Listar() as $r): ?>
                            <tr>

                                <td><?php echo $r->__GET('nombre'); ?></td>
                                <td><?php echo $r->__GET('telefono'); ?></td>
                                <td><?php echo $r->__GET('correo'); ?></td>
                                <td>
                                    <a href="?action=editar&idProveedor=<?php echo $r->idProveedor; ?>">Editar</a>
                                </td>
                                <td>
                                    <a href="?action=eliminar&idProveedor=<?php echo $r->idProveedor; ?>">Eliminar</a>
                                </td>
                            </tr>
        </div>        
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
    </body>
</html>
