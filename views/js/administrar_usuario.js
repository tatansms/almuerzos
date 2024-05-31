$(document).ready(function () {
  data();
  ajaxVerUsuarios();

})

function ajaxVerUsuarios() {
  $.ajax({
    url: "/../../controllers/actionadmin/ver-usuarios.php",
    success: function (result) {
      console.log(result);
      insertarUsuariosEnTabla(JSON.parse(result));
    },
    error: function (xhr) {
      alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
    }
  });
}
function data() {
  $.ajax({
    url: "/../../controllers/actionchart/data.php",
    success: function (result) {
      console.log("resultado");
    },
    error: function (xhr) {
      alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
    }
  });
}


$(document).ready(function () {
  $('form').submit(function (event) {
    event.preventDefault();

    // Hacer la solicitud AJAX
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
          if(!result.estado){

          } else { 
            location.reload();
          }
          
        });
      },
      error: function (err) {
        console.error('Error:', err);
      }
    });
  });
});

function insertarUsuariosEnTabla(result) {
  console.log(result);
  let usuarios = '';
  $.each(result, function (i) {
    usuarios += '<tr id=' + result[i].ID_user + '>'
      + '<td class="data-list" width="100" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].ID_user + '</td>'
      + '<td class="data-list" width="100" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].Nombre + '</td>'
      + '<td class="data-list" width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].Apellido + '</td>'
      + '<td class="data-list" width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].Email + '</td>'
      + '<td class="data-list" width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].Celular + '</td>'
      + '<td class="data-list" width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].programa + '</td>'
      + '<td class="data-list" width="150" class="text-center" style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'
      + '<div class="btn-container">'
      + '<a class="editar btn btn-sm" data-id="' + result[i].ID_user + '" style="background-color: #007BFF; color: #fff;" role="button" aria-pressed="true">'
      + '<i class="fas fa-edit"></i> Editar</a>'
      + '</div>'
      + '<div class="btn-container">'
      + '<a  data-id="' + result[i].ID_user + '" class="deleteuser btn btn-danger btn-sm" role="button" aria-pressed="true">'
      + '<i class="fas fa-trash-alt"></i> Eliminar</a>'
      + '</div></td>'
      + '</tr>';
  });

  $("#usuariosRegistrados tbody").append(usuarios);
  insertarDatosUsuarioEnModal();

}

function insertarDatosUsuarioEnModal() {
  $('.editar').click(function () {
    var userID = $(this).data('id');
    console.log(userID);
    $.ajax({
      url: '/../../controllers/actionadmin/verUsuarioPorId.php?idUsuario=' + userID,
      success: function (response) {
        var usuario = JSON.parse(response);
        console.log(response);
        $("#modalEditarUsuario").modal('show');
        $("#modalEditarUsuario input[name='IdUsuario']").val(usuario.ID_user);
        $("#modalEditarUsuario input[name='nombres']").val(usuario.Nombre);
        $("#modalEditarUsuario input[name='apellidos']").val(usuario.Apellido);
        $("#modalEditarUsuario input[name='email']").val(usuario.Email);
        $("#modalEditarUsuario input[name='contrasena']").val(usuario.Contrasena);
        $("#modalEditarUsuario input[name='celular']").val(usuario.Celular);
        // Seleccionar el programa del usuario en el select correspondiente
        var programaSelect = $("#modalEditarUsuario select[name='programa']");
        programaSelect.val(usuario.ID_programa);

        // Seleccionar el rol del usuario en el select correspondiente
        var rolSelect = $("#modalEditarUsuario select[name='rol']");
        rolSelect.val(usuario.ID_rol);
      },
      error: function (err) {
        console.error('Error:', err);
      }
    });
  });
  $('.deleteuser').click(function () {
    var userID = $(this).data('id');
    console.log(userID);
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción no se puede deshacer.',
      icon: 'warning',
      confirmButtonColor: '#3085d6',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminarlo'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/../../controllers/actionadmin/eliminarUsuario.php?idUsuario=' + userID,
          success: function (response) {
            console.log(response);
            var result = JSON.parse(response);
            
            Swal.fire({
              icon: result.estado ? 'success' : 'error',
              title: result.msg,
              showConfirmButton: false,
              timer: 1500
            }).then(function () {
              // Recarga la página después de cerrar SweetAlert
              location.reload();
            });
          },
          error: function (err) {
            console.error('Error:', err);
          }
        });
      }
    });
  });


}


