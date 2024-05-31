$(document).ready(function () {
  ajaxVerAlmuerzosEnMenu();
})

function ajaxVerAlmuerzosEnMenu() {
  $.ajax({
    url: "/../../controllers/action/ver-menu.php",
    success: function (result) {
      console.log(result);
      insertarAlmuerzosEnMenuEnTabla(JSON.parse(result));
    },
    error: function (xhr) {
      alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
    }
  });
}

function insertarAlmuerzosEnMenuEnTabla(result) {
  console.log(result);
  let almuerzosEnMenu = '';
  $.each(result, function (i) {

    almuerzosEnMenu += '<tr id=' + result[i].ID_almuerzo + '>'
      + '<td class="data-list" width="100" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].ID_almuerzo + '</td>'
      + '<td class="data-list" width="100" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].nombre + '</td>'
      + '<td class="data-list" width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].ID_menu + '</td>'
      + '<td class="data-list" width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">' + result[i].dia + '</td>'
      + '<td class="data-list" width="150" class="text-center" style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'
      + '<div class="btn-container">'
      + '<a class="editaralmenu btn btn-sm" data-id="' + result[i].ID_almuerzo + '" data-menu-id="' + result[i].ID_menu +  '" style="background-color: #007BFF; color: #fff;" role="button" aria-pressed="true">'
      + '<i class="fas fa-edit"></i> Editar</a>'
      + '</div>'
      + '<div class="btn-container">'
      + '<a  data-id="' + result[i].ID_almuerzo + '" data-menu-id="' + result[i].ID_menu + '" class="deleteAlmuerzoEnMenu btn btn-danger btn-sm" role="button" aria-pressed="true">'
      + '<i class="fas fa-trash-alt"></i> Eliminar</a>'
      + '</div></td>'
      + '</tr>';
  });

  $("#almuerzosEnMenu tbody").append(almuerzosEnMenu);
  insertarDatosAlmuerzoEnMenuEnModal();

}

function insertarDatosAlmuerzoEnMenuEnModal() {
  $('.editaralmenu').click(function () {
    var almuerzoID = $(this).data('id');
    var menuID = $(this).data('menu-id');
    console.log(almuerzoID);
    console.log(menuID);
    $.ajax({
      url: '/../../controllers/action/verAlmuerzoMenuId.php?idAlmuerzo=' + almuerzoID + '&idMenu=' + menuID,
      success: function (response) {
        var almue = JSON.parse(response);
        console.log(almue);
        $("#modalEditarAlmuerzoMenu").modal('show');
        $("#modalEditarAlmuerzoMenu input[name='ID_almuerzo']").val(almue[0].ID_almuerzo);
        $("#modalEditarAlmuerzoMenu input[name='nombre']").val(almue[0].nombre);
        $("#modalEditarAlmuerzoMenu input[name='ID_menu']").val(almue[0].ID_menu);
        var diaSelect = $("#modalEditarAlmuerzoMenu select[name='dia']");
        diaSelect.val(almue[0].ID_dia);
      },
      error: function (err) {
        console.error('Error:', err);
      }
    });
  });
  $('.deleteAlmuerzoEnMenu').click(function () {
    var almuerzoID = $(this).data('id');
    var menuID = $(this).data('menu-id');
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
          url: '/../../controllers/action/eliminarAlmuerzoMenu.php?idAlmuerzo=' + almuerzoID + '&idMenu=' + menuID,
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