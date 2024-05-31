const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const main = document.getElementById('main');

signUpButton.addEventListener('click', () => {
  main.classList.add("right-panel-active");
});
signInButton.addEventListener('click', () => {
  main.classList.remove("right-panel-active");
});
/**Jquery para formularios */


$(document).ready(function () {
  $('form').submit(function (event) {
    event.preventDefault();

    // Verificar si es el formulario de registro
    if ($(this).attr('id') === 'registroForm') {
      var nombre = $.trim($("input[name='name']").val());
      var apellido = $.trim($("input[name='lastname']").val());
      var emailRegistro = $.trim($("input[name='email']").val());
      var passwordRegistro = $.trim($("input[name='pswd']").val());
      var telefono = $.trim($("input[name='phone']").val());
      var programa = $("#programa").val();

      if (nombre.length === 0 || apellido.length === 0 || emailRegistro.length === 0 || passwordRegistro.length === 0 || telefono.length === 0 || programa === null) {
        Swal.fire({
          icon: 'warning',
          title: 'Debe completar todos los campos en el formulario de registro',
        });
        return false;
      }

      // Resto del código para el formulario de registro...
    }

    // Verificar si es el formulario de inicio de sesión
    if ($(this).attr('id') === 'formLogin') {
      var emailLogin = $.trim($("#Email").val());
      var passwordLogin = $.trim($("#Contraseña").val());

      if (emailLogin.length === 0 || passwordLogin.length === 0) {
        Swal.fire({
          icon: 'warning',
          title: 'Debe ingresar un Email y/o Contraseña en el formulario de inicio de sesión',
        });
        return false;
      }

      // Resto del código para el formulario de inicio de sesión...
    }

    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: $(this).serialize(), // Serializa los datos del formulario
      success: function (response) {
        console.log(response);
        var result = JSON.parse(response);

        // Muestra el mensaje de éxito
        Swal.fire({
          icon: result.estado ? 'success' : 'error',
          title: result.msg,
          showConfirmButton: false,
          timer: 1500
        }).then(function () {
          if (result.msg!="El usuario ha sido registrado correctamente, Inicia sesion" && result.estado==true) {
            window.location.href = 'menu.php';
          } else if(result.msg=="El usuario ha sido registrado correctamente, Inicia sesion"){
                window.location.href = 'login.php';
            }
        });
      },
      error: function (err) {
        console.error('Error:', err);
      }
    });
  });
});
