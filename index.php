<?php
require_once('pages/bd.php')
?>

<html>

<link rel="stylesheet" href="css/style.css">
    <head>

        <title>INICIO</title>
        <h1 >Papeleria la veci</h1>

        <style>
            h1{
  margin-top: 60px;
  font-size: 50px;
  text-align: center;
  text-transform: uppercase;
  color: #ffffff; 
  }
h2{
  margin-top: 0%;
  font-size: 50px;
  text-align: center;
  color: #0048e4;
  }

.datosMuestra{               
      background-position: center;
      color:#0048e4;
      font-size: 50px;
      font-family:courier;
  }
.botones{    
      background-color: #00363f;
      border: none; color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      text-align: center;
  }

  .fondoDePantalla{
  background-size: cover;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-position: center center;
  background-color: #fff;
  background-image: url("images/fondo2.jpg");
  }

  .entradaDatos{           
  align-items: center;
  width: 20%;
  padding: 6px ;
  }
  .contenedorLogin{

  width: 50%;
  box-sizing: border-box;
  height: auto; 
  margin: 0;
  padding: 10px;
  background-color: rgba(255,255,255,.9);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 30px;
  color: #3F51B5;
  }
  div{

  text-align: center;

  }

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
</style>


    </head>
<body class = "fondoDePantalla">

<div class="contenedorLogin">

    <h2>INGRESO</h2>

    <form action="menu2.html">
        <div >    
                <label class = "datosMuestra" for=""> Usuario</label>           
        </div>
       <div>
                <input class = "entradaDatos" type="text" name="user" required pattern="[a]dmin"/>
        </div>
        <br>
        <div>
            <label class = "datosMuestra" for=""> Clave</label>
        </div>
        <div>   
            <input class = "entradaDatos" type="password" name="clave" required pattern="[L]aveci2021"/>   
        </div>
        <br>
        <button type="submit" name="submit">INICIAR SESIÓN</button>
    </form>

</div>
<?php
@$usuario = $_POST['user'];
@$clave = $_POST['clave'];

if(isset($_POST['submit'])){
    
    echo "inicio sesión";

    }elseif (isset($_POST['user']) && isset($_POST['clave'])){

            try {
                $sql=$conn->query("SELECT * FROM usuarios WHERE usuario=='$usuario' AND clave=='$clave'");
                $filas=$sql->fetchColumn();
                } catch (PDOException $e) {
                    $e->getMessage();
            }

        echo "Verifique los campos, datos erroneos"; 

    }else{
              
}          

 ?>
</body>

</html>



