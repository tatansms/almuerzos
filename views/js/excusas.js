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
