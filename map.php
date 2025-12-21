<!-- -----------------------------------------------------------------------------------------------

     |  ___|  __ \  |   |  _ \   _ \   
     | |      |   | |   | |   | |   |  
 \   | |      |   | |   | __ <  |   |  
\___/ \____| ____/ \___/ _| \_\\___/   
                                       
  ___|  _ \  __ \  ____|    _ )   _ _| __ \  ____|    \     ___|  
 |     |   | |   | __|     _ \ \   |  |   | __|     _ \  \___ \  
 |     |   | |   | |      ( `  <   |  |   | |      ___ \       | 
\____|\___/ ____/ _____| \___/\/ ___|____/ _____|_/    _\_____/        

------------------------------------------------------------------------------------------------ --> 


<?php

require_once __DIR__ . "/conexion.php"; // crea $pdo
require __DIR__ . '/track_visit.php'; // inserta visita

// CONSULTA PARA LA TABLA Y EL MAPA
$sql = "SELECT iso_pais, COUNT(*) AS visitas
        FROM visitas_mapa
        GROUP BY iso_pais";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// total visitas
$total = 0;
foreach ($rows as $r) {
    $total += (int)$r['visitas'];
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <title>Visit Map</title>

<!-- Bootstrap 5 CSS desde CDN -->
<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
  crossorigin="anonymous"
/>

      <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/css/jquery-jvectormap.css">
    <link rel="stylesheet" href="/css/flags/flag-icon.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="#" />
  </head>
  <body>

<header>

<div class="header-wrap clearfix">
    <div class="logo"><a href="https://jcduro.bexartideas.com/index.php" class="brand">
        <img src="img/logoJCDBLUE.png" width="320" style="border-radius:10%" alt="logo1" class="logo">
        <img src="img/logoJCDBLUEletras.png" width="320" style="border-radius:10%" alt="logo2" class="logo">
    </a></div>
    <nav class="nav-menu">
      <a href="https://jcduro.bexartideas.com/templates/jcduro.php">Inicio</a>
      <a href="https://jcduro.bexartideas.com/templates/jcduro.php#projects">Proyectos</a>
      <a href="https://jcduro.bexartideas.com/templates/jcduro.php#contact">Contacto</a>
    </nav>
  </div>
</header>


<main>
  <div id="audience-map" class="vector-map"></div>
</main>

<div class="projects-container">
  <div class="table-responsive">
    <table class="table">
      <tbody>
      <?php foreach ($rows as $row):
            $iso     = strtolower($row['iso_pais']);
            $visitas = (int)$row['visitas'];
            $porc    = $total > 0 ? round($visitas * 100 / $total, 2) : 0;
      ?>
        <tr>
          <td><i class="flag-icon flag-icon-<?= htmlspecialchars($iso) ?>"></i></td>
          <td><?= strtoupper(htmlspecialchars($iso)) ?></td>
          <td><?= $visitas ?></td>
          <td><?= $porc ?>%</td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
  crossorigin="anonymous"
></script>

    <!-- 1. jQuery primero -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="/js/jquery-jvectormap.min.js"></script>
<script src="/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="/js/map.js"></script>
  
    


<footer>
  <div class="footer-wrap">

    <div class="social-links">
    <a href="https://www.facebook.com/profile.php?id=61581848413029" target="_blank" class="social-icon">
      <i class="fab fa-facebook-f"></i>
    </a>
     <a href="https://github.com/jcduro" target="_blank" class="social-icon">
	 <i class="fab fa-github"></i>
    </a>
  </div>
  <span id="copy">&copy; 2025 JcDuro - Code & Ideas.</span>
  </div>
</footer>
</body>
</html>

