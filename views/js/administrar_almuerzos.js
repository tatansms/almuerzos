$(document).ready(function () {
  ajaxVerAlmuerzos();
})

function ajaxVerAlmuerzos() {
  $.ajax({
    url: "/../../controllers/action/ver-almuerzos.php",
    success: function (result) {
      console.log(result);
      insertaAlmuerzosEnTabla(JSON.parse(result));
    },
    error: function (xhr) {
      alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
    }
  });
}


function insertaAlmuerzosEnTabla(result) {
  console.log(result);
  let almuerzo = '';
  $.each(result, function (i) {
    almuerzo += '<tr id=' + result[i].ID_almuezo + '>'
      + '<td class="data-list" width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].ID_almuerzo + '</td>'
      + '<td class="data-list" width="100" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].nombre + '</td>'
      + '<td class="data-list data-list-description " width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px; ">' + result[i].descripcion + '</td>'
      + '<td class="data-list " width="150" class="text-center" style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'
      + '<div class="btn-container">'
      + '<a class="editaralmuerzo btn btn-sm" data-id="' + result[i].ID_almuerzo + '" style="background-color: #007BFF; color: #fff;" role="button" aria-pressed="true">'
      + '<i class="fas fa-edit"></i> Editar</a>'
      + '</div>'
      + '<div class="btn-container">'
      + '<a  data-id="' + result[i].ID_almuerzo + '" class="deletealmuerzo btn btn-danger btn-sm" role="button" aria-pressed="true">'
      + '<i class="fas fa-trash-alt"></i> Eliminar</a>'
      + '</div></td>'
      + '</tr>';
  });

  $("#almuerzosRegistrados tbody").append(almuerzo);
  insertarDatosAlmuerzoenModal();

}

function insertarDatosAlmuerzoenModal() {
  $('.editaralmuerzo').click(function () {
    var almuerzoID = $(this).data('id');
    console.log(almuerzoID);
    $.ajax({
      url: '/../../controllers/action/verAlmuerzoporId.php?ID_almuerzo=' + almuerzoID,
      success: function (response) {
        var almuerzo = JSON.parse(response);
        console.log(response);
        $("#modalEditarAlmuerzo").modal('show');
        $("#modalEditarAlmuerzo input[name='ID_almuerzo']").val(almuerzo.ID_almuerzo);
        $("#modalEditarAlmuerzo input[name='nombre']").val(almuerzo.nombre);
        $("#modalEditarAlmuerzo input[name='descripcion']").val(almuerzo.descripcion);
      },
      error: function (err) {
        console.error('Error:', err);
      }
    });
  });
  $('.deletealmuerzo').click(function () {
    var almuerzoID = $(this).data('id');

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
          url: '/../../controllers/action/eliminarAlmuerzo.php?ID_almuerzo=' + almuerzoID,
          success: function (response) {
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


