<?php

require_once(__DIR__ . "/../controllers/actionchart/data.php");
if (!isset($_SESSION['ID_USUARIO'])) {
	// Redirige a login.php después de 2 segundos
	echo '<script>
        setTimeout(function() {
            window.location = "login.php";
        }, 2000);
    </script>';
	exit; // Asegura que no se procese más código PHP
}

if ($_SESSION["ID_ROL"] === 1) {
	// Redirige a index.php después de 2 segundos
	echo '<script>
		setTimeout(function () {
			window.location = "menu.php";
		}, 2000);
	</script>';
	exit; // Asegura que no se procese más código PHP
}
if ($_SESSION["cantidadEstudiantes"] === null) {
	// Redirige a login.php después de 2 segundos
	echo '<script>
		  setTimeout(function() {
			  location.reload();
		  }, 2000);
	  </script>';
	exit; // Asegura que no se procese más código PHP
  }
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!----======== CSS ======== -->
	<link rel="stylesheet" href="css/admin.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" referrerpolicy="no-referrer" />
	<!----===== Iconscout CSS ===== -->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="css/sweetalert2.min.css">

	<title>Admin Dashboard Panel</title>
</head>

<body>

	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>

	<main id="main-content">
		<nav>
			<div class="logo-name">
				<div class="logo-image">
					<img src="/assets/img/principal.svg" alt="">
				</div>

				<span class="logo_name">MyLunch</span>
			</div>

			<div class="menu-items">
				<ul class="nav-links">
					<li><a href="/index.php" class="1">
							<i class="uil uil-estate active"></i>
							<span class="link-name active">Inicio </span>
						</a></li>
					<li><a href="#" class="Almuerzos">
							<i class='bx bxs-bowl-rice'></i>
							<span class="link-name">Almuerzos</span>
						</a></li>
					<li><a href="#" class="En-Menu">
							<i class='bx bxs-food-menu'></i>
							<span class="link-name">En-menu</span>
						</a></li>
				</ul>

				<ul class="logout-mode">
					<li><a href="/../controllers/action/logout.php">
							<i class="uil uil-signout"></i>
							<span class="link-name">Logout</span>
						</a></li>

					<li class="mode">
						<a href="#">
							<i class="uil uil-moon"></i>
							<span class="link-name">Dark Mode</span>
						</a>

						<div class="mode-toggle">
							<span class="switch"></span>
						</div>
					</li>
				</ul>
			</div>
		</nav>

		<section id="prin" class="dashboard">
			<div class="top">
				<i class="uil uil-bars sidebar-toggle"></i>

				<div class="search-box">
					<i class="uil uil-search"></i>
					<input type="text" placeholder="Search here...">
				</div>
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

			</div>

			<div class="dash-content">
				<section class="overview" class="hide" id="over">
				</section>
				<section id="Usuarios" class="hide">
					<div class="activity">
						<div class="title">
							<i class="uil uil-clock-three"></i>
							<span class="text">Usuarios</span>
							<!-- Button trigger modal -->
							<div class="container-fluid">
								<div class="justify-content-center row">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearUsuario">
										Crear usuario
									</button>
								</div>
							</div>
						</div>
						<table class="activity-data table" id="usuariosRegistrados">
							<thead class="table">
								<tr>
									<th class="data-title" scope="col">ID</th>
									<th class="data-title" scope="col">Nombres</th>
									<th class="data-title" scope="col">Apellidos</th>
									<th class="data-title" scope="col">Email</th>
									<th class="data-title" scope="col">Celular</th>
									<th class="data-title" scope="col">Programa</th>
									<th class="data-title" scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody class="data">

							</tbody>
						</table>
					</div>

					<!-- Modal CREAR USUARIO -->
					<div class="modal fade" id="modalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="/../controllers/actionadmin/registrarUsuario.php" method="post">
									<div class="modal-body">
										<div class="container-fluid">
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Nombres" type="text" class="form-control" name="nombres">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Apellidos" type="text" class="form-control" name="apellidos">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Email" type="email" class="form-control" name="email"></div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Contraseña" type="password" class="form-control" name="contrasena"></div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Celular" type="text" class="form-control" name="celular">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="rol col-md-8">
													<select class="programaSelect form-control" name="programa">
														<option disabled selected>Programa</option>
													</select>
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="rol col-md-8">
													<select class=" form-control" name="rol">
														<option>Elegir rol</option>
														<option value="2">Administrador</option>
														<option value="1">Estudiante</option>
													</select>
												</div>
											</div>
											<div class="justify-content-center row">
												<button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-primary">Guardar</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- end modal -->

					<!-- Modal EDITAR USUARIO-->
					<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="ModalEditarLabel">Editar usuario</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="formEditarUsuario" action="/../controllers/actionadmin/editarUsuario.php" method="post">
									<div class="modal-body">
										<div class="container-fluid">
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="ID usuario" type="text" class="form-control" name="IdUsuario" readonly>
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Nombres" type="text" class="form-control" name="nombres">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Apellidos" type="text" class="form-control" name="apellidos">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Email" type="email" class="form-control" name="email"></div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Contraseña" type="password" class="form-control" name="contrasena"></div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Celular" type="text" class="form-control" name="celular">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="rol col-md-8">
													<select class="programaSelect form-control" name="programa">
														<option disabled selected>Programa</option>
													</select>
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="rol col-md-8">
													<select class=" form-control" name="rol">
														<option disabled selected>Elegir rol</option>
														<option value="2">Administrador</option>
														<option value="1">Estudiante</option>
													</select>
												</div>
											</div>
											<input hidden type="number" class="form-control" name="idUsuario">
											<div class="justify-content-center row">
												<button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-primary">Guardar</button>
											</div>

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- end modal -->
				</section>
				<!-- end USER -->
				<section id="Almuerzos" class="hide">
					<div class="activity">
						<div class="title">
							<i class="uil uil-clock-three"></i>
							<span class="text">Almuerzos</span>
							<!-- Button trigger modal -->
							<div class="container-fluid">
								<div class="justify-content-center row">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearAlmuerzo">
										Crear almuerzo
									</button>
								</div>
							</div>
						</div>
						<table class="activity-data table" id="almuerzosRegistrados">
							<thead class="table">
								<tr>
									<th class="data-title" scope="col">ID</th>
									<th class="data-title" scope="col">Nombre</th>
									<th class="data-title" scope="col">Descripción</th>
									<th class="data-title" scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody class="data">

							</tbody>
						</table>
					</div>
					<!-- Modal CREAR USUARIO -->
					<div class="modal fade" id="modalCrearAlmuerzo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Registrar Almuerzo</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="/../controllers/action/registrarAlmuerzo.php" method="post">
									<div class="modal-body">
										<div class="container-fluid">
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="ID" type="email" class="form-control" name="ID_almuerzo" readonly></div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Nombre" type="text" class="form-control" name="nombre">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Descripcion" type="text" class="form-control" name="descripcion">
												</div>
											</div>
											<div class="justify-content-center row">
												<button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-primary">Guardar</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal EDITAR ALMUERZO-->
					<div class="modal fade" id="modalEditarAlmuerzo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="ModalEditarLabel">Editar usuario</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="formEditarAlmuerzo" action="/../controllers/action/editarAlmuerzo.php" method="post">
									<div class="modal-body">
										<div class="container-fluid">
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="ID" type="text" class="form-control" name="ID_almuerzo" readonly>
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Nombre" type="text" class="form-control" name="nombre">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Descripción" class="form-control" name="descripcion">
												</div>
											</div>

											<div class="justify-content-center row">
												<button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-primary">Guardar</button>
											</div>

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- end modal -->
				</section>
				<!-- end Almuerzo -->
				<section id="En-Menu" class="hide">
					<div class="activity">
						<div class="title">
							<i class="uil uil-clock-three"></i>
							<span class="text">Almuerzos en Menu</span>
							<!-- Button trigger modal -->
							<div class="container-fluid">
								<div class="justify-content-center row">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarAlmuerzoMenu">
										Crear almuerzo
									</button>
								</div>
							</div>
						</div>
						<table class="activity-data table" id="almuerzosEnMenu">
							<thead class="table">
								<tr>
									<th class="data-title" scope="col">IDalmuerzo</th>
									<th class="data-title" scope="col">Nombre Almuerzo</th>
									<th class="data-title" scope="col">IDmenu</th>
									<th class="data-title" scope="col">Día</th>
									<th class="data-title" scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody class="data">

							</tbody>
						</table>
					</div>
					<!-- Modal CREAR ALMUEZO -->
					<div class="modal fade" id="agregarAlmuerzoMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Agregar un Almuerzo</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="/../controllers/action/registrarAlmuerzoMenu.php" method="post">
									<div class="modal-body">
										<div class="container-fluid">
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="IDalmuerzo" type="text" class="form-control" name="ID_almuerzo">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="rol col-md-8">
													<select class="diaSelect form-control" name="dia">
														<option disabled selected>Dia</option>
													</select>
												</div>
											</div>
											<div class="justify-content-center row">
												<button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-primary">Guardar</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal EDITAR MENU-->
					<div class="modal fade" id="modalEditarAlmuerzoMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="ModalEditarLabel">Editar almuerzo en Menu</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="formEditarAlmuerzoMenu" action="/../controllers/action/editarAlmuerzoMenu.php" method="post">
									<div class="modal-body">
										<div class="container-fluid">
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="ID_almuerzo" type="text" class="form-control" name="ID_almuerzo" readonly>
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="Nombre" type="text" class="form-control" name="nombre">
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="col-md-8"><input placeholder="IDmenu" class="form-control" name="ID_menu" readonly>
												</div>
											</div>
											<div style="padding:7px 0;" class="justify-content-center row">
												<div class="rol col-md-8">
													<select class="diaSelect form-control" name="dia">
														<option disabled selected>Dia</option>
													</select>
												</div>
											</div>

											<div class="justify-content-center row">
												<button type="button" class="mr-4 btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-primary">Guardar</button>
											</div>

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- end modal -->
				</section>

			</div>
			<section id="charts" class="hide">
				<div class="column">
					<div class="box-c">
						<canvas id="graficoUsuariosPorPrograma" width="400" height="400"></canvas>

					</div>
				</div>
				<div class="column">
					<div class="round">
						<!-- En tu archivo HTML -->
						<canvas id="donacionesPorMesChart" width="400" height="200"></canvas>

					</div>
				</div>
			</section>
		</section>


	</main>

	<script src="js/adminfront.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			// Oculta todas las secciones excepto la primera al cargar la página
			$(".hide").hide();
			$("#Usuarios").show();
			$("#prin").show();
			$("#over").show();

			// Maneja los clics en los enlaces de la lista
			$(".Menu").click(function(e) {

				$(".hide").hide();
				$("#Menu").show();
				$("#prin").show();

			});
			$(".En-Menu").click(function(e) {

				$(".hide").hide();
				$("#En-Menu").show();
				$("#prin").show();

			});
			$(".Usuarios").click(function(e) {

				$(".hide").hide();
				$("#Usuarios").show();
				$("#prin").show();

			});
			$(".Almuerzos").click(function(e) {

				$(".hide").hide();
				$("#Almuerzos").show();
				$("#prin").show();

			});
			$(".charts").click(function(e) {

				$(".hide").hide();
				$("#charts").show();
				$("#prin").show();

			});
		});
	</script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="js/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script src="js/administrar_usuario.js"></script>
	<script src="js/administrar_almuerzos.js"></script>
	<script src="js/administrar_menu.js"></script>
	<script src="js/cargarProgramas.js"></script>
	<script src="js/cargarDias.js"></script>
	<script src="js/admincharts.js"></script>
</body>

</html>