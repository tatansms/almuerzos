$(document).ready(function () {
  ajaxVerExcusas();
});

function ajaxVerExcusas() {
  $.ajax({
    url: "/controllers/action/ver-excusas.php", // Ajusta la ruta según sea necesario
    success: function (result) {
      try {
        var data = JSON.parse(result);
        insertarExcusasEnTabla(data);
      } catch (e) {
        console.error("Error al analizar JSON:", e);
      }
    },
    error: function (xhr) {
      alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
    }
  });
}

function insertarExcusasEnTabla(result) {
  let excusas = '';
  $.each(result, function (i, excusa) {
    excusas += '<tr class="excusa-fila" id="excusa_' + excusa.ID_excusa + '">'
      + '<td style="vertical-align: middle;">' + excusa.convocatoria + '</td>'
      + '<td style="vertical-align: middle;"> Almuerzo </td>'
      + '<td style="max-width: 450px; word-wrap: break-word; white-space: normal; vertical-align: middle;">' + excusa.descripcion + '</td>'
      + '<td style="text-align: center; vertical-align: middle;">' + excusa.fecha + '</td>'
      + '</tr>';
    console.log("Fila HTML generada:", excusas);
  });

  $("#excusasRegistradas").append(excusas);
}
$(document).ready(function() {
  $('#guardarExcusaBtn').on('click', function() {
      var convocatoria = $('#convocatoria').val();
      var descripcion = $('#descripcion').val();
      var fecha = $('#fecha').val();
var fechaSeleccionada = new Date(fecha);
var idDia = fechaSeleccionada.getDay(); // Esto retorna 0 para Domingo, 1 para Lunes, etc.

// Mapear los días de la semana según la base de datos (1 a 5)
var diasBD = [1, 2, 3, 4, 5]; // Días en tu base de datos
var diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"]; // Correspondencia en JavaScript

// Obtener el nombre del día según el valor en la base de datos
var nombreDia = diasSemana[diasBD.indexOf(idDia + 1)]; // Sumar 1 a idDia porque getDay() retorna 0 para Domingo, 1 para Lunes, etc.


      // Añadir console.log para verificar nombreDia
      console.log("dia", idDia);

      $.ajax({
          type: "POST",
          url: "/../../controllers/action/agregarExcusa.php",
          data: {
              convocatoria: convocatoria,
              descripcion: descripcion,
              fecha: fecha,
              idDia: idDia,
              nombreDia: nombreDia
          },
          success: function(response) {
              var responseData = JSON.parse(response);
              if (responseData.estado === true) {
                  swal("Excusa agregada", responseData.msg, "success").then(function() {
                      location.reload();
                  });
              } else {
                  swal("Error", responseData.msg, "error");
              }
          },
          error: function(xhr) {
              console.error("Error en la solicitud AJAX", xhr.statusText);
              swal("Error", "Hubo un problema al procesar la solicitud", "error");
          }
      });
  });
});
