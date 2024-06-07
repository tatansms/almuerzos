$(document).ready(function () {
    ajaxVerFallas();
  });
  
  function ajaxVerFallas() {
    $.ajax({
      url: "/controllers/action/ver-fallas.php", // Ajusta la ruta según sea necesario
      success: function (result) {
        try {
          var data = JSON.parse(result);
          insertarFallasEnTabla(data);
        } catch (e) {
          console.error("Error al analizar JSON:", e);
        }
      },
      error: function (xhr) {
        alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
      }
    });
  }
  
  function insertarFallasEnTabla(result) {
    let fallas = '';
    $.each(result, function (i, falla) {
      fallas += '<tr class="falla-fila" id="falla_' + falla.ID_falla + '">'
        + '<td style="vertical-align: middle;">' + falla.ID_falla + '</td>'
        + '<td style="text-align: center; vertical-align: middle;">' + falla.fecha + '</td>'
        + '</tr>';
      console.log("Fila HTML generada:", fallas);
    });
  
    $("#fallasRegistradas").append(fallas);
  }
  