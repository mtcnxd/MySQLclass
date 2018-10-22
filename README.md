# MySQLclass
Clase para trabajar con mysql


/*
 * 
 * DOCUMENTACION
 * 


// CREAMOS LA CONEXION

$mysql = new MySQL('host','user','password','database');
$mysql->mySQLconnect();

// INSERTAMOS REGISTROS

$vars = array(
	"Columna01"=>"'XXX'",
	"Columna02"=>"'XXX'",
);
$mysql->mySQLinsert('artcategorias', $vars);

// MODIFICAMOS REGISTRO

$vars = array(
	"Columna01"=>"'XXX'",
	"Columna02"=>"'XXX'",
);

$mysql->mySQLupdate('table', $vars, "ID = 1");

// BUSCAMOS REGISTROS

$data = $mysql->mySQLselect("tabla","ID = 1","ID DESC");

echo "<table width=20%>";
foreach ($data as $value) {
	echo "<tr>";
	echo "<td>". $value->Columna01 ."</td>";
	echo "<td>". $value->Columna02 ."</td>";
	echo "<td>". $value->'Columna03' ."</td>";
	echo "</tr>";
}
echo "</table>";

// CERRAMOS LA CONEXION

$mysql->mySQLdisconnect();

*/
