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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="css/profile.css">
</head>

<body>

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
                <a href="excusas.php" class="dropdown-item">Mis excusas</a>
                <a href="fallas.php" class="dropdown-item">Mis fallas</a>
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
  <div class="container emp-profile">
    <form method="post">
      <div class="row">
        <div class="col-md-4">
          <div class="profile-img">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="" />
            <div class="file btn btn-lg btn-primary">
              Change Photo
              <input type="file" name="file" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="profile-head">
            <h5>
              <?php echo $_SESSION["NOMBRE"] . " ";
              echo $_SESSION["APELLIDO"];
              ?>
            </h5>
            <h6>
              <?php echo $_SESSION["NOMBRE_ROL"]; ?>
            </h6>
            <p class="proile-rating">Donaciones : <span>4/5</span></p>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
              </li>
              
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <input id="btn-edit-profile" type="button" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="profile-work">
            
          </div>
        </div>
        <div class="col-md-8">
          <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-md-6">
                  <label>Name</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $_SESSION["NOMBRE"] . " " . $_SESSION["APELLIDO"]; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Email</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $_SESSION["EMAIL"]; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Phone</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $_SESSION["CELULAR"]; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Profession</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $_SESSION["NOMBRE_PROGRAMA"]; ?></p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-md-6">
                  <label>Experience</label>
                </div>
                <div class="col-md-6">
                  <p>Expert</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Hourly Rate</label>
                </div>
                <div class="col-md-6">
                  <p>10$/hr</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Total Projects</label>
                </div>
                <div class="col-md-6">
                  <p>230</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>English Level</label>
                </div>
                <div class="col-md-6">
                  <p>Expert</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Availability</label>
                </div>
                <div class="col-md-6">
                  <p>6 months</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Your Bio</label><br />
                  <p>Your detail description</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <form  action="" method="POST">
      <imput type="hidden" value="1" />
      <input id="delete" type="submit" name="eliminar_usuario" class="delete" value=" Eliminar Cuenta">
    </form>

    <div id="overlay"></div>
    <!-- Account details card-->
    <div class="win-float" id="win-fixed">
      <div class="card mb-4">
        <div class="card-header">Account Details</div>
        <div class="card-body">
          <form action="../controllers/action/updateinfo.php" method="post">
            <!-- Form Group (username)-->
            <div class="mb-3">
              <label class="small mb-1" for="inputUsername">Username (Como tu nombre aparecerá para las otras personas del sitio)</label>
              <input class="form-control" id="inputUsername" name="nuevoUsername" type="text" placeholder="Enter your username" value="username">
            </div>
            <!-- Form Row-->
            <div class="row gx-3 mb-3">
              <!-- Form Group (first name)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputFirstName">Nombres</label>
                <input class="form-control" id="inputFirstName" name="nuevoNombre" type="text" placeholder="Escribe tu nombre" value="<?php echo $_SESSION["NOMBRE"]; ?>">
              </div>
              <!-- Form Group (last name)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputLastName">Apellidos</label>
                <input class="form-control" id="inputLastName" name="nuevoApellido" type="text" placeholder="Escribe tu apellido" value="<?php echo $_SESSION["APELLIDO"]; ?>">
              </div>
            </div>
            <!-- Form Group (email address)-->
            <div class="mb-3">
              <label class="small mb-1" for="inputEmailAddress">Email address</label>
              <input class="form-control" id="inputEmailAddress" name="nuevoEmail" type="email" placeholder="Ingresa tu correo electronico" value="<?php echo $_SESSION["EMAIL"]; ?>">
            </div>
            <!-- Form Row-->
            <div class="row gx-3 mb-3">
              <!-- Form Group (phone number)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputPhone">Phone number</label>
                <input class="form-control" id="inputPhone" name="nuevoTelefono" type="tel" placeholder="Enter your phone number" value="<?php echo $_SESSION["CELULAR"]; ?>">
              </div>
            </div>
             <!-- Form Row        -->
             <div class="row gx-3 mb-3">
              <!-- Form Group (organization name)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputOrgName">Cambiar la contraseña(Opcional)</label>
                <input class="form-control" id="inputOrgName" name="nuevaContraseña" type="password" placeholder="Ingresa una nueva contraseña"  value="">
              </div>
              <!-- Form Group (location)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputLocation"></label>
                <input class="form-control" id="inputLocation" name="confirmarContraseña" type="password" placeholder="Confirma la nueva contraseña" value="">
              </div>
            </div>
            <!-- Save changes button-->
            <input class="btn btn-primary" type="submit" name="submitActualizar" value="Actualizar" style="border:none;">
          </form>
        </div>
      </div>
    </div>

  </div>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/profile.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
</body>

</html>