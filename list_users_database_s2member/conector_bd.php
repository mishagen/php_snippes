<?php
/*
	Aquí definimos el objeto y método para conectarnos a la bbdd.  
*/

class Cconexion{
	private static $host="localhost";
	private static $usuario="root";
	private static $password="";
	private static $db="aerco_vir";
	public  $conexion;


	public function __construct() {
	
       $this->conexion = new mysqli(Cconexion::$host,Cconexion::$usuario,Cconexion::$password,Cconexion::$db);

       	if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}


		$this->conexion->set_charset("utf8"); // output utf-8 ;)

	}




 	public static function doit($sql){

 			/*
				Funcion static. Damos de alta objeto conect. realizamos conexión y consulta en base al string "sql" que enviamos. 
			*/
 			$conec=new Cconexion();
 			$result=$conec->conexion->query($sql);
 			
 			if($conec->conexion->error){
 				// print($conec->conexion->error);
 				$result=$conec->conexion->error;
 				return $result;
 				
 			}
 			// print_r($sql);
 			$conec->conexion->close();
 			return $result;
 	}
}


?>