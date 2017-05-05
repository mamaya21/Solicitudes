<?php
	 error_reporting(E_ALL ^ E_DEPRECATED);
	/*-------------------------
	Autor: Marco Amaya
	Web: -
	Mail: marco1021tam@gmail.com
	---------------------------*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos


	//$username = $_GET['us'];

	$sql= "SELECT a.nombre as nombre,b.artista as artista,c.nom_genero as genero
	FROM tab_canciones as a
	left outer join tab_artistas as b on b.id_artista=a.artista
	left outer join tab_generos as c on c.id_genero= a.genero";

	if($con){
		$rcn= odbc_exec($con,$sql);
		$contador=0;

		while ($algo=odbc_fetch_array($rcn)) { 
			$contador++;
			$algo = array_map('utf8_encode', $algo);
			$filas[] = $algo;
		} 
		odbc_free_result($rcn);
		odbc_close($conexion);
		//print(json_encode($filas));
		echo ''. json_encode($filas) .''; 
		//echo '{"items":'. $contador .'}'; 
	}else{
		echo "No conectado";
	}
	
?>