<?
function connectDB(){
	$server = "localhost";
	$user = "root";
	$pass = "root";
	$bd = "rentaCasas";
	
	$conexion = mysqli_connect($server, $user, $pass, $bd);
	
	if ($conexion){
		//echo 'La conexion se hizo correctamente';
	}else{
		echo 'Error al conectar la base de datos';
	}
	return $conexion;
}	
function disconnectDB($conexion){
	$close = mysqli_close($conexion);
	if($close){
		//echo 'Se desconecto correctamente';
	}else{
		echo 'Error al desconectar la base de datos';
	}
	return  $close;
}
function getArraySQL($query){
	//Creamos la conexion a la DB
	$conexion = connectDB();
	//Hacemos la consulta
	$result = mysqli_query($conexion, $query);
	if (!$result){
		die(); //Si la conexion NO fue exitosa, cancela el programa
	}
	//Creamos un array de datos
	$rawdata = array();
	//Guardamos un array multidimensional todos los datos de la consulta
	$i=0;
	while ($row=mysqli_fetch_array($result)){
		$rawdata[$i]=$row;
		$i++;
	}
	//Desconectamos la DB
	disconnectDB($conexion);
	//Retornamos el array
	return $rawdata;
}
	$query = 'SELECT imagen, deposito, mensualidad, genero FROM casa;';
	$myArray = getArraySQL($query);
	
	//Creamos el Json
	echo json_encode($myArray);
	
?>







































