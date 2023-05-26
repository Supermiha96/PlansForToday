<?php
require_once 'conexion.php';

$cityName = $_GET['city'];

$query = $conexion->prepare('SELECT ciu_nom FROM ciudad WHERE ciu_nom LIKE ?');
$cityNameParam = '%' . $cityName . '%';
$query->bindParam(1, $cityNameParam);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$ciudades = array();

foreach ($result as $row) {
    $ciudades[] = $row['ciu_nom'];
}

echo json_encode($ciudades);