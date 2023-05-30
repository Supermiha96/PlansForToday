<?php
// CONECTAR CON LA BBDD USANDO dwes/abc123
// SI HAY ERRORES, SALIR
// USAR UTF-8

$host_name = '192.168.192.129';
$database = 'plansfortoday';
$user_name = 'dwes';
$password = 'abc123';

global $conexion;
try {
    if ($conexion == null) {
        $conexion = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
        
    }
} catch (PDOException $p) {
    $bd = null;
    echo "<p style='color: red'>Hubo un error en la conexión a la Base de datos.</p>";
}
return $conexion;


/*
function conectarConBD()
{
    $host_name = 'db5013208083.hosting-data.io';
    $database = 'dbs11081996';
    $user_name = 'dbu595633';
    $password = 'PlansForToday';
    $dbh = null;


    global $bd;
    try {
        if ($dbh == null) {
            $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
        }
    } catch (PDOException $e) {
        $dbh = null;
        echo "Error!:" . $e->getMessage() . "<br/>";
        die();
    }
    return $bd;
}
conectarConBD();
*/
