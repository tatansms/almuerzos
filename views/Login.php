<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

<body>

    <div class="container" id="main">
        <div class="Sign-Up">
            <form id="registroForm" action="../controllers/action/signup.php" method="post">
                <h1 class="texto">Crear cuenta</h1>
                <input type="text" name="name" placeholder="Nombres">
                <input type="text" name="lastname" placeholder="Apellidos">
                <input type="email" name="email" placeholder="Correo electrónico">
                <input type="password" name="pswd" placeholder="Contraseña" required="">
                <input type="text" name="phone" placeholder="Celular">
                <select class="programaSelect" id="programa" name="programa">
                    <option value="" disabled selected hidden>Programa</option>
                </select>
                <button value="submitt">Registrarse</button>
            </form>
        </div>
        <div class="Sign-In">
            <form id="formLogin" action="../controllers/action/login.php" method="POST">
                <h1>Iniciar Sesión</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <p>Usar tu cuenta</p>
                <input id="Email" type="email" name="email" placeholder="Correo electrónico" autocomplete="username">
                <input id="Contraseña" type="password" name="pswd" placeholder="Contraseña" autocomplete="current-password">
                <a href="forgot-password.php">¿Olvidaste tu contraseña?</a>
                <button value="submit">Ingresar</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <h1>Bienvenido</h1>
                    <p>Inicia un nuevo camino con nosotros</p>
                    <button id="signIn">Iniciar sesión</button>
                </div>
                <div class="overlay-right">
                    <h1>¡Hola!</h1>
                    <p>Que gusto tenerte de vuelta</p>
                    <button id="signUp" disabled></button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/log_in.js"></script>
    <script src="js/cargarProgramas.js"></script>
</body>

</html>