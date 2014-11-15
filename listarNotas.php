<?php
    include("configuracion.php");

    $enlace = mysql_connect($db_host,$db_user,$db_password)
            or die('No pudo conectarse: ' . mysql_error());
            mysql_select_db($db_database) or die('No pudo seleccionarse la BD.');
            mysql_set_charset('utf8',$enlace); //para el tema de tildes

    $query = "SELECT * FROM notas order by id_nota";

    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Query invalido: ' . mysql_error() . "\n";
        $message .= 'Query completa: ' . $query;
        die($message);
    }
    echo "<table border='1' cellspacing='0'>";
    echo "<tr>";
//    echo "<td><b>ID Nota</b></td>";
    echo "<td><b>Titulo</b></td>";
//    echo "<td><b>Nota</b></td>";
    echo "</tr>";
    while($resultado = mysql_fetch_array($result)){
        echo "<tr>";
//        echo "<td>".$resultado["id_nota"]."</td>";
        echo "<td>".$resultado["titulo_nota"]."</td>";
//        echo "<td>".$resultado["info_nota"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>