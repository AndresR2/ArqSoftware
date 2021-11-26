<?php
class inventario{

	private $id_producto;
	private $marca;
	private $producto;
	private $descripcion;
	private $idProveedor;
	private $costo_unidad;
	private $cantidad;
	private $precioBruto;
	private $precioVenta;
	private $disponibilidad;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
class InventarioModel{
	private $pdo;

	public function __CONSTRUCT(){
		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=arqdb', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar(){
		try{

			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM inventario");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

				$alm = new inventario();

				$alm->__SET('id_producto', $r->id_producto);
				$alm->__SET('marca', $r->marca);
				$alm->__SET('producto', $r->producto);
				$alm->__SET('descripcion', $r->descripcion);
				$alm->__SET('idProveedor', $r->idProveedor);
				$alm->__SET('costo_unidad', $r->costo_unidad);
				$alm->__SET('cantidad', $r->cantidad);
				$alm->__SET('precioBruto', $r->precioBruto);
				$alm->__SET('precioVenta', $r->precioVenta);
				$alm->__SET('disponibilidad', $r->disponibilidad);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id_producto){
		try{
			$stm = $this->pdo
			   ->prepare("SELECT * FROM inventario WHERE id_producto = ?");

			$stm->execute(array($id_producto));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new inventario();

			$alm->__SET('id_producto', $r->id_producto);
			$alm->__SET('marca', $r->marca);
			$alm->__SET('producto', $r->producto);
			$alm->__SET('descripcion', $r->descripcion);
			$alm->__SET('idProveedor', $r->idProveedor);
			$alm->__SET('costo_unidad', $r->costo_unidad);
			$alm->__SET('cantidad', $r->cantidad);
			$alm->__SET('precioBruto', $r->precioBruto);
			$alm->__SET('precioVenta', $r->precioVenta);
			$alm->__SET('disponibilidad', $r->disponibilidad);


			return $alm;

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_producto){
		try{
		$stm = $this->pdo
			->prepare("DELETE FROM inventario WHERE id_producto = ?");
		$stm->execute(array($id_producto));
	
		} catch (Exception $e)
		
		{ 
		die($e->getMessage());
		}	
	}

	public function Actualizar(inventario $data){
		try{

	$sql = "UPDATE inventario SET
					
		marca          = ?,
		producto        = ?,
		descripcion     = ?,
		idProveedor      =?,
		costo_unidad     = ?,
		cantidad = ?,
		precioBruto = ?,
		precioVenta = ?,
		disponibilidad = ?
		
		WHERE id_producto = ?";

	$this->pdo->prepare($sql)
		->execute(
		array(
	
		$data->__GET('marca'),
		$data->__GET('producto'),
		$data->__GET('descripcion'),
		$data->__GET('idProveedor'),
		$data->__GET('costo_unidad'),
		$data->__GET('cantidad'),
		$data->__GET('precioBruto'),
		$data->__GET('precioVenta'),
		$data->__GET('disponibilidad'),
		$data->__GET('id_producto')

		)
		);
		}catch (Exception $e){
		die($e->getMessage());
		}
	}

	public function Registrar(inventario $data){
		try{
		$sql = "INSERT INTO inventario (marca,producto,descripcion,idProveedor, costo_unidad,cantidad,precioBruto,precioVenta,disponibilidad)
		    VALUES (?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
			->execute(
			array(

		$data->__GET('marca'),
		$data->__GET('producto'),
		$data->__GET('descripcion'),
		$data->__GET('idProveedor'),
		$data->__GET('costo_unidad'),
		$data->__GET('cantidad'),
		$data->__GET('precioBruto'),
		$data->__GET('precioVenta'),
		$data->__GET('disponibilidad')
			)
	);
		}catch(Exception $e){
	die($e->getMessage());
		}
	}
}

class Proveedor{
	
	private $idProveedor;
	private $nombre;
	private $telefono;
	private $correo;

	public function __GET($k){return $this->$k; }
	public function __SET($k, $v){return $this->$k = $v; }
}

class ProveedorCRUD{
	private $pdo;

	public function __CONSTRUCT(){
		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=arqdb', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar(){
		try{

			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM proveedor");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

				$alm = new proveedor();

				$alm->__SET('idProveedor', $r->idProveedor);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('correo', $r->correo);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($idProveedor){
		try{
			$stm = $this->pdo
			   ->prepare("SELECT * FROM proveedor WHERE idProveedor = ?");

			$stm->execute(array($idProveedor));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new proveedor();

			$alm->__SET('idProveedor', $r->idProveedor);
			$alm->__SET('nombre', $r->nombre);
			$alm->__SET('telefono', $r->telefono);
			$alm->__SET('correo', $r->correo);


			return $alm;
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idProveedor){
	try{
		$stm = $this->pdo
			->prepare("DELETE FROM proveedor WHERE idProveedor = ?");

		$stm->execute(array($idProveedor));
	} catch (Exception $e)
	{
		die($e->getMessage());
	}
	}

	public function Actualizar(proveedor $data){
		try{

	$sql = "UPDATE proveedor SET
					
		nombre          = ?,
		telefono        = ?,
		correo 			= ?
		
		WHERE idProveedor = ?";

	$this->pdo->prepare($sql)
		->execute(
		array(

	
		$data->__GET('nombre'),
		$data->__GET('telefono'),
		$data->__GET('correo'),
		$data->__GET('idProveedor')

		)
		);
		}catch (Exception $e){
		die($e->getMessage());
		}
	}

	public function Registrar(proveedor $data){
		try{
		$sql = "INSERT INTO proveedor (nombre,telefono,correo)
		    VALUES (?,?,?)";

		$this->pdo->prepare($sql)
			->execute(
			array(
		
		$data->__GET('nombre'),
		$data->__GET('telefono'),
		$data->__GET('correo')
			)
	);
		}catch(Exception $e){
	die($e->getMessage());
		}
	}

}

class facturaEncabezado{
	
	private $id_factura;
	private $cliente;
	private $telefono;
	private $fecha;

	public function __GET($k){return $this->$k; }
	public function __SET($k, $v){return $this->$k = $v; }
}

class FacturaCRUD{
	private $pdo;

	public function __CONSTRUCT(){ //conecxion base de datos
		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=arqdb', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar(){
		try{

			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM facturaEncabezado");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

				$alm = new facturaEncabezado();

				$alm->__SET('id_factura', $r->id_factura);
				$alm->__SET('cliente', $r->cliente);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('fecha', $r->fecha);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
	public function Obtener($id_factura){
		try{
			$stm = $this->pdo
			   ->prepare("SELECT * FROM facturaEncabezado WHERE id_factura = ?");

			$stm->execute(array($id_factura));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new facturaEncabezado();

			$alm->__SET('id_factura', $r->id_factura);
			$alm->__SET('cliente', $r->cliente);
			$alm->__SET('telefono', $r->telefono);
			$alm->__SET('fecha', $r->fecha);


			return $alm;
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_factura){
	try{
		$stm = $this->pdo
			->prepare("DELETE FROM facturaEncabezado WHERE id_factura = ?");

		$stm->execute(array($id_factura));
	} catch (Exception $e)
	{
		die($e->getMessage());
	}
	}

	public function Actualizar(facturaEncabezado $data){
		try{

	$sql = "UPDATE facturaEncabezado SET
					
		cliente          = ?,
		telefono        = ?,
		fecha = ?
		
		WHERE id_factura = ?";

	$this->pdo->prepare($sql)
		->execute(
		array(

		$data->__GET('id_factura'),	
		$data->__GET('cliente'),
		$data->__GET('telefono'),
		$data->__GET('fecha')

		)
		);
		}catch (Exception $e){
		die($e->getMessage());
		}
	}

	public function Registrar(facturaEncabezado $data){
		try{
		$sql = "INSERT INTO facturaEncabezado (cliente,telefono,fecha)
		    VALUES (?,?,?)";

		$this->pdo->prepare($sql)
			->execute(
			array(

		$data->__GET('cliente'),
		$data->__GET('telefono'),
		$data->__GET('fecha')
			)
	);
		}catch(Exception $e){
	die($e->getMessage());
		}
	}

}

?>