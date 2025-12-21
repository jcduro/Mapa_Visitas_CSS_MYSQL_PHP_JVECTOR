
<?php
require __DIR__ . '/geo_helpers.php';
require_once __DIR__ . "/conexion.php"; // tu PDO/mysqli



$ip      = getUserIP();
$pagina  = $_SERVER['REQUEST_URI'];
$agent   = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ahora   = date('Y-m-d H:i:s');

$iso     = getCountryByIP($ip) ?? 'UN'; // UN = unknown
$pais    = $iso; // luego lo puedes mapear a nombre real

// 1) Insertar en tabla visitas (log)
$stmt = $pdo->prepare("
    INSERT INTO visitas_mapa (ip, iso_pais, pais, pagina, user_agent, fecha_hora)
    VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->execute([$ip, $iso, $pais, $pagina, $agent, $ahora]);

// 2) Actualizar tabla visitas_pais (upsert)
$stmt = $pdo->prepare("SELECT id, visitas FROM visitas_pais WHERE iso_pais = ?");
$stmt->execute([$iso]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $stmt = $pdo->prepare("
        UPDATE visitas_pais
        SET visitas = visitas + 1,
            ultima_visita = ?
        WHERE id = ?
    ");
    $stmt->execute([$ahora, $row['id']]);
} else {
    $stmt = $pdo->prepare("
        INSERT INTO visitas_pais (iso_pais, pais, visitas, ultima_visita)
        VALUES (?, ?, 1, ?)
    ");
    $stmt->execute([$iso, $pais, $ahora]);
}
