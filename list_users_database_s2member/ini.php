<html>    <head>
    <title>Ejercio BASE DATOS - paxina</title>
      <meta charset="utf-8"> 
    </head>
    <body>

    <table border="1" color="black">
    	<tr>
    	<th>ID</th>
    	
       	<th>user_registered</th>
    	<th>user_email</th>
    	<th>level</th>
    	<th>usr_login</th>
    	<th>usr_pass</th>
    	<th>nice_name</th>
    	<th>display_name</th>
    	<th>description</th>
    	<th>dni</th>
    	<th>empresa</th>
    	<th>cif</th>
    	<th>cargo</th>
    	<th>direccion</th>
    	<th>ciudad</th>
    	<th>provincia</th>
    	<th>pais</th>
    	<th>twitter</th>
    	<th>facebook</th>
    	<th>linkedin</th>
    	<th>puesto_trabajo</th>
    	<th>sector</th>
    	<!--  <th>cargo</th> -->
    	<!--  <th>empresa</th>  -->
    	<!--  <th>cif</th> -->
    	<th>contratacion</th>
    	<th>experiencia_total</th>
    	<th>experiencia_sociales</th>
    	<th>directorio</th>
    	</tr>



<?php

require "conector_bd.php";

	
	
	// Funcion para determinar qué provincia
	function _STATE($value){
		switch ($value) {
		 				case '0':
		 					$value = "N/A";
		 					break;
		 				case '1':
		 					$value = "Araba/Álava";
		 					break;
		 				case '2':
		 					$value = "Albacete";
		 					break;
		 				case '3':
		 					$value = "Alicante/Alacant";
		 					break;
		 				case '4':
		 					$value = "Almería";
		 					break;
		 				case '5':
		 					$value = "Ávila";
		 					break;
		 				case '6':
		 					$value = "Badajoz";
		 					break;
		 				case '7':
		 					$value = "Balears, Illes";
		 					break;
		 				case '8':
		 					$value = "Barcelona";
		 					break;
		 				case '9':
		 					$value = "Burgos";
		 					break;
		 				case '10':
		 					$value = "Cáceres";
		 					break;
		 				case '11':
		 					$value = "Cádiz";
		 					break;
		 				case '12':
		 					$value = "Castellón/Castelló";
		 					break;
		 				case '13':
		 					$value = "Ciudad Real";
		 					break;
		 				case '14':
		 					$value = "Córdoba";
		 					break;
		 				case '15':
		 					$value = "Coruña, A";
		 					break;
		 				case '16':
		 					$value = "Cuenca";
		 					break;
		 				case '17':
		 					$value = "Girona";
		 					break;
		 				case '18':
		 					$value = "Granada";
		 					break;
		 				case '19':
		 					$value = "Guadalajara";
		 					break;
		 				case '20':
		 					$value = "Gipuzkoa";
		 					break;
		 				case '21':
		 					$value = "Huelva";
		 					break;
		 				case '22':
		 					$value = "Huesca";
		 					break;
		 				case '23':
		 					$value = "Jaén";
		 					break;
		 				case '24':
		 					$value = "León";
		 					break;
		 				case '25':
		 					$value = "Lleida";
		 					break;
		 				case '26':
		 					$value = "Rioja, La";
		 					break;
		 				case '27':
		 					$value = "Lugo";
		 					break;
		 				case '28':
		 					$value = "Madrid";
		 					break;
		 				case '29':
		 					$value = "Málaga";
		 					break;
		 				case '30':
		 					$value = "Murcia";
		 					break;
		 				case '31':
		 					$value = "Navarra";
		 					break;
		 				case '32':
		 					$value = "Ourense";
		 					break;
		 				case '33':
		 					$value = "Asturias";
		 					break;
		 				case '34':
		 					$value = "Palencia";
		 					break;
		 				case '35':
		 					$value = "Palmas, Las";
		 					break;
		 				case '36':
		 					$value = "Pontevedra";
		 					break;
		 				case '37':
		 					$value = "Salamanca";
		 					break;
		 				case '38':
		 					$value = "Santa Cruz de Tenerife";
		 					break;
		 				case '39':
		 					$value = "Cantabria";
		 					break;
		 				case '40':
		 					$value = "Segovia";
		 					break;
		 				case '41':
		 					$value = "Sevilla";
		 					break;
		 				case '42':
		 					$value = "Soria";
		 					break;
		 				case '43':
		 					$value = "Tarragona";
		 					break;
		 				case '44':
		 					$value = "Teruel";
		 					break;
		 				case '45':
		 					$value = "Toledo";
		 					break;
		 				case '46':
		 					$value = "Valencia/València";
		 					break;
		 				case '47':
		 					$value = "Valladolid";
		 					break;
		 				case '48':
		 					$value = "Bizkaia";
		 					break;
		 				case '49':
		 					$value = "Zamora";
		 					break;
		 				case '50':
		 					$value = "Zaragoza";
		 					break;
		 				case '51':
		 					$value = "Ceuta";
		 					break;
		 				case '52':
		 					$value = "Melilla";
		 					break;
		 			
		 				default:
		 					$value = "N/A";
		 					break;
		 			}
		 			return $value;
	}

//----------------------------------------------------------------------------------------------------------------
//			     ***************************** CONSULTA MYSQL *****************************
//----------------------------------------------------------------------------------------------------------------
		 $sql = "SELECT	wp_users.ID,wp_users.user_registered,wp_users.user_email,wp_users.user_login,wp_users.user_pass,wp_users.user_nicename,wp_users.display_name,wp_usermeta.meta_value as datos_usr, M.datos_reg, N.datos_nota, K.datos_desc
				FROM wp_users 
				INNER JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id  
				INNER JOIN (SELECT user_id,meta_value as datos_reg FROM wp_usermeta WHERE meta_key = 'wp_capabilities' ) M  ON wp_usermeta.user_id = M.user_id 
				INNER JOIN (SELECT user_id,meta_value as datos_nota FROM wp_usermeta WHERE meta_key = 'wp_s2member_notes' ) N  ON wp_usermeta.user_id = N.user_id 
				INNER JOIN (SELECT user_id,meta_value as datos_desc FROM wp_usermeta WHERE meta_key = 'description' ) K  ON wp_usermeta.user_id = K.user_id
				WHERE wp_usermeta.meta_key = 'wp_s2member_custom_fields'
				ORDER BY wp_users.ID ASC 
				";




	    $consulta = Cconexion::doit($sql);
//----------------------------------------------------------------------------------------------------------------


	if(is_object($consulta) && $consulta->num_rows>0){ // si resultado de la consulta devuelve algo
		 while($filas=$consulta->fetch_array(MYSQL_ASSOC)){

		 		/*
		 		*  algunos registros de la bbdd son arrays serializados. Procesamos.
		 		*/
		 		
		 		$filas['datos_reg'] = unserialize($filas['datos_reg']); // datos registros usuario (estandar wp)
		 		$filas['datos_usr'] = unserialize($filas['datos_usr']); // datos registro usuario (s2member)
		 		$filas['datos_nota'] = unserialize($filas['datos_nota']); // datos ampliados registro usuario (s2member)
		 		// $filas['datos_desc']; // datos descripción registro usuario (estandar wp)

		 		$level="";

			 	foreach ($filas['datos_reg'] as $key => $value) {
			 			if (count($filas['datos_reg'])>1){
			 				$level.=$key.",\n";
			 			} else {
			 				$level=$key;
			 			}		
			 	}


		 		if(isset($filas['datos_usr']['provincia'])){
		 			$filas['datos_usr']['provincia'] = _STATE($filas['datos_usr']['provincia']);
		 		}


		 		 print_r($filas);


		 
		 		// COMPLETAMOS TABLA (la cabecera ya está creada en HTML)
		 		print('<tr>');

		 		if(isset($filas['ID'])){ // ID
		 			print('<td>'.$filas['ID'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		if(isset($filas['user_registered'])){ // fecha registro
		 			print('<td>'.$filas['user_registered'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		if(isset($filas['user_email'])){ // email usuario
		 			print('<td>'.$filas['user_email'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}


		 		print('<td>'.$level.'</td>'); // nivel de usuario

		 		if(isset($filas['user_login'])){ // nombre para login
		 			print('<td>'.$filas['user_login'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		if(isset($filas['user_pass'])){ // contraseña (Hash)
		 			print('<td>'.$filas['user_pass'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}


		 		if(isset($filas['user_nicename'])){ // nombre bonito ;)
		 			print('<td>'.$filas['user_nicename'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		if(isset($filas['display_name'])){ // nombre a mostrar 
		 			print('<td>'.$filas['display_name'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}


		 		if(isset($filas['datos_desc'])){
		 			print('<td>'.$filas['datos_desc'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 		// s2member 

		 		if(isset($filas['datos_usr']['dni'])){
		 			print('<td>'.$filas['datos_usr']['dni'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 		if(isset($filas['datos_usr']['empresa'])){ // empresa 
		 			print('<td>'.$filas['datos_usr']['empresa'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		 if(isset($filas['datos_usr']['cif'])){
		 			print('<td>'.$filas['datos_usr']['cif'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 		if(isset($filas['datos_usr']['cargo'])){
		 			print('<td>'.$filas['datos_usr']['cargo'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		if(isset($filas['datos_usr']['direccion'])){
		 			print('<td>'.$filas['datos_usr']['direccion'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		if(isset($filas['datos_usr']['ciudad'])){
		 			print('<td>'.$filas['datos_usr']['ciudad'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		if(isset($filas['datos_usr']['provincia'])){
		 			print('<td>'.$filas['datos_usr']['provincia'].'</td>');
		 		} else {
		 			 print('<td></td>');
		 		}

		 		if(isset($filas['datos_usr']['pais'])){
		 			print('<td>'.$filas['datos_usr']['pais'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 	

		 		if(isset($filas['datos_usr']['twitter'])){
		 			print('<td>'.$filas['datos_usr']['twitter'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 		if(isset($filas['datos_usr']['facebook'])){
		 			print('<td>'.$filas['datos_usr']['facebook'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 	    if(isset($filas['datos_usr']['linkedin'])){
		 			print('<td>'.$filas['datos_usr']['linkedin'].'</td>');
		 		} else {
		 			 print('<td></td>'); }


		 	    if(isset($filas['datos_usr']['puesto_trabajo'])){
		 			print('<td>'.$filas['datos_usr']['puesto_trabajo'].'</td>');
		 		} else {
		 			 print('<td></td>'); }


		 		if(isset($filas['datos_usr']['sector'])){ // ES UN ARRAY!!! 
		 			// print('<td>'.$filas['datos_usr']['sector'].'</td>');
		 			$aux = "";
		 			foreach ($filas['datos_usr']['sector'] as $key => $value) {
		 				
		 				if(count($filas['datos_usr']['sector'])>1){
							$aux.=$value.",\n";
						} else {
							$aux=$value;
						}
		 				
		 			}
		 			 print('<td>'.$aux.'</td>'); 
		 		} else {
		 			 print('<td></td>'); }

		 		/* if(isset($filas['datos_usr']['cargo'])){
		 			print('<td>'.$filas['datos_usr']['cargo'].'</td>');
		 		} else {
		 			 print('<td></td>'); }


		 		if(isset($filas['datos_usr']['empresa'])){
		 			print('<td>'.$filas['datos_usr']['empresa'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 		if(isset($filas['datos_usr']['cif'])){
		 			print('<td>'.$filas['datos_usr']['cif'].'</td>');
		 		} else {
		 			 print('<td></td>'); } */

		 		if(isset($filas['datos_usr']['contratacion'])){
		 			print('<td>'.$filas['datos_usr']['contratacion'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 		if(isset($filas['datos_usr']['experiencia_total'])){
		 			print('<td>'.$filas['datos_usr']['experiencia_total'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 		if(isset($filas['datos_usr']['experiencia_sociales'])){
		 			print('<td>'.$filas['datos_usr']['experiencia_sociales'].'</td>');
		 		} else {
		 			 print('<td></td>'); }

		 		if(isset($filas['datos_usr']['directorio'])){
		 			print('<td>'.$filas['datos_usr']['directorio'].'</td>');
		 		} else {
		 			print('<td></td>'); }

		 		print('</tr>'); 
 
		 			// print_r($filas);
		}
	}

?>

</table>


</body>
</html>
