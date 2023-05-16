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