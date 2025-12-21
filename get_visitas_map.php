<?php
require_once __DIR__ . "/../../conexion/conexion.php"; // tu PDO/mysqli

header('Content-Type: application/json; charset=utf-8');

$stmt = $pdo->query("
    SELECT iso_pais AS code,
           visitas   AS value
    FROM visitas_pais
");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);
