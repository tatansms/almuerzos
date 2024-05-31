<?php
session_start();
if (!isset($_SESSION['ID_USUARIO'])) {
	// Redirige a login.php después de 2 segundos
	echo '<script>
        setTimeout(function() {
            window.location = "login.php";
        }, 2000);
    </script>';
	exit; // Asegura que no se procese más código PHP
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <title>Fila virtual</title>
  <!-- Google fonts-->
  <link rel="stylesheet" href="css/Fila.css">
</head>
<body>
  <!-- Navigation-->
  <header class="header-area">
    <nav class="navigation-s">
      <div class="navigation-d">
        <div class="logo-area">
          <!--icono top-->
          <img class="" src="/assets/img/principal.svg" alt="" srcset="">
          <a href="#" class="navbar-brand logo">My<span>Luch</span></a>
        </div>
        <div class="mobile-nav">
          <i class="fas fa-bars" style="color: white;"></i>
        </div>
        <div class="nav">
          <ul class="nav-list">
            <li class="items"><a href="/../index.php" id="">Home</a></li>
            <li class="items dropdown">
              <a href="#content-servicios" class="nav-link" data-toggle="dropdown" style="margin:0px;padding:0px;">Servicios</a>
              <div class="dropdown-menu">
                <a href="menu.php" class="dropdown-item">Menu</a>
                <a href="fila-virtual.php" class="dropdown-item">Fila virtual</a>
                <a href="donaciones.php" class="dropdown-item">Donaciones</a>
                <a href="#"  class="dropdown-item btnAbrirModal">Calificaciones</a>
              </div>
            </li>
            <li class="items"><a href="#">Contact us</a></li>
            <li class="items" id="back-donar"><a href="donaciones.php" id="donar-text">Donar</a></li>
            <li class="items nav-link dropdown" style="margin:0px;padding:0px;">
              <a href="profile.php" class="nav-link" data-toggle="dropdown" >
                <div class="img-box">
                  <div class="info-pfp">
                    <h5 class="texto text-pfp">
                      <?php echo $_SESSION["NOMBRE"] . " ";
                      echo $_SESSION["APELLIDO"];
                      ?>
                    </h5>
                    <p class="texto rol-pfp">
                      <?php echo $_SESSION['NOMBRE_ROL'] . " "; ?>
                    </p>
                  </div>
                  <div class="img-box-in">
                    <img src="/assets/img/people/pic-2.jpg" alt="">
                  </div>

                </div>
              </a>
              <div class="dropdown-menu">
                <a href="profile.php" class="dropdown-item">Editar perfil</a>
                <a href="dashboardadmin.php" class="dropdown-item">Dashboard</a>
                <a href="/../controllers/action/logout.php" class="dropdown-item">Cerrar sesión</a>
              </div>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="img-side">
    <div class="back-static">
      <div class="move">

      </div>
    </div>
  </section>
  <div class="Container">
    <h1 class="Título">Fila Virtual</h1>
    <h3>Ticket de turno</h3>
      
      </div>
      <aside>
        <p>...</p>
      </aside>
  </div>
  <div>
    <div class="svg-section circle">
      <svg id="elipse1" width="960" height="960" viewBox="0 0 960 960" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="480" cy="480" r="479.5" stroke="#101A24" stroke-opacity="0.2" />
      </svg>
      <svg id="elipse2" width="960" height="960" viewBox="0 0 960 960" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="480" cy="480" r="479.5" stroke="#101A24" stroke-opacity="0.2" />
      </svg>
      <svg id="elipse3" width="960" height="960" viewBox="0 0 960 960" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="480" cy="480" r="479.5" stroke="#101A24" stroke-opacity="0.2" />
      </svg>
    </div>
  </div>

  <div class="card bg-secondary bg-opacity-50 shadow-lg mb-3 h-100">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-3 h-100">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center justify-content-center">
            <div class="Turno text-center">
              <div class="Turno_text"><p>Su turno</p></div>
              <h1>9</h1>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="Fecha">
                <div class="fecha_text"><p>Fecha</p></div>
                <p class="fecha_number">14/09/2023</p>
              </div>
              <div class="Botones_Fila">
                <!-- Botón para cancelar turno -->
                <div class="Cancelar">
                  <button class="Cancelar_turno">Cancelar turno</button>
                </div>
                <!-- Botón para ingresar a la fila -->
                <div>
                  <button class="Ingresar_Fila">Ingresar a la fila</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="js/fila_virtual.js"></script>
<script>
  disminuirCada5Segundos()
</script>
</body>
</html>