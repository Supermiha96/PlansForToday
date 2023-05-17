<?php
// CONECTAR CON LA BBDD USANDO dwes/abc123
// SI HAY ERRORES, SALIR
// USAR UTF-8

$bd;

function conectarConBD(){
    global $bd;
    try{
        if ($bd == null){
            $bd = new PDO("mysql:host=localhost;dbname=plansfortoday;charset=utf8", "dwes", "abc123");
        }
    }
     catch(PDOException $p){
        $bd = null;
        echo "<p style='color: red'>Hubo un error en la conexión a la Base de datos.</p>";
    }
    return $bd;
}

/*
function conectarConBD()
{
    $host_name = 'db5013056405.hosting-data.io';
    $database = 'dbs10962471';
    $user_name = 'dbu3049804';
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
