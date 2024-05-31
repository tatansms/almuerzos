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
  <title>Donaciones</title>
  <!--icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="css/donar.css">
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
  <main>

    <section class="img-side">
      <div class="back-static">
      </div>
    </section>
    <div class="container-total">
      <div class="top-side">
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
      <div class="container">
        <div class="titulo">
          <p>Donaciones activas</p>
        </div>
        <section class="container_cards_d">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="table-responsive px-3">
                          <table class="table table-striped align-middle table-nowrap" id="tablaDinamica">
                            <tbody id="cuerpoTabla">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="container_confirmacion">
        <div class="titulo">
          <h1>¡Ayuda al que lo necesita!</h1>
        </div>
        <img src="assets/img/menu/comida.jpg" alt="Plato de comida">
        <div class="verificar-identidad">
          <p>Verifica que eres tu:</p>
          <input type="text" name="pswd" placeholder="Ingrese su contraseña" required="true">
          <div class="BotonesDonar">
          <button class="Cancelar">Cancelar</button>
          <button class="Donar">Donar almuerzo</button>
          </div>
        </div>
      </div>
    </div>
  </main>
<!-- Agrega el CDN de SweetAlert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/donaciones.js"></script>
</body>
</html>