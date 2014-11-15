<?php
/*
 * Este es el php que se encarga de insertar en la base de datos las notas.
 * recibe del html por POST 2 parametros (cTitulo y cNota)(ojo no hace validaciones de seguridad)
 * luego con el include("configuracion.php"); carga los parametros de confuguración, con $enlace establece la conexion
 * a la base de datos y construye el insert. Devuelve  "Nota guardada exitosamente" si no muere (die) por algun error 
 * con la conexion o con la ejecucion del query
 */
session_start();
$_SESSION['vTitulo']=$_POST['cTitulo'];
$_SESSION['vNota']=$_POST['cNota'];

include("configuracion.php");

$enlace = mysql_connect($db_host,$db_user,$db_password)
        or die('No pudo conectarse: ' . mysql_error());
        mysql_select_db($db_database) or die('No pudo seleccionarse la BD.');
        mysql_set_charset('utf8',$enlace); //para el tema de tildes

$query =sprintf("INSERT INTO `notas` (`titulo_nota`, `info_nota`) VALUES ('%s','%s')", 
        mysql_real_escape_string($_SESSION['vTitulo']),
        mysql_real_escape_string($_SESSION['vNota']));

//echo $query;
mysql_query($query)or die('Error, en la inserción de la nota. ' . mysql_error());

echo "Nota guardada exitosamente";

?>