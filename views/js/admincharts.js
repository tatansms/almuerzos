// En tu archivo JavaScript
$(document).ready(function () {
    // Llama a la función AJAX para obtener datos de usuarios por programa
    ajaxUsuariosPorPrograma();
    ajaxObtenerDonacionesPorMes();
});

function ajaxUsuariosPorPrograma() {
    $.ajax({
        url: "/../../controllers/actionchart/porprograma.php",
        success: function (result) {
            var data = JSON.parse(result);
            crearGrafico(data);
        },
        error: function (xhr) {
            alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
        }
    });
}

function crearGrafico(data) {
    var ctx = document.getElementById('graficoUsuariosPorPrograma').getContext('2d');

    // Configura el gráfico de barras
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(item => item.Programa),
            datasets: [{
                label: 'Cantidad de Usuarios por Programa',
                data: data.map(item => item.CantidadUsuarios),
                backgroundColor: ['rgba(75, 192, 192, 0.2)','rgba(192, 75, 192, 0.2)','rgba(192, 192, 75, 0.2)'] ,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
  
  // Función para obtener los datos de donaciones por mes desde el servidor
  function ajaxObtenerDonacionesPorMes() {
    $.ajax({
      url: "/../../controllers/actionchart/pordonacion.php", // Ajusta la ruta según tu estructura
      success: function (result) {
        console.log(result);
        // Convierte los datos JSON recibidos a un array de objetos
        var data = JSON.parse(result);
  
        // Llama a la función para dibujar el gráfico de líneas
        dibujarGraficoLineas(data);
      },
      error: function (xhr) {
        alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
      }
    });
  }
  
  // Función para dibujar el gráfico de líneas
  function dibujarGraficoLineas(data) {
    var ctx = document.getElementById('donacionesPorMesChart').getContext('2d');
  
    // Extrae las etiquetas y datos del array de objetos
    var etiquetas = data.map(function (elemento) {
      return elemento.Mes;
    });
  
    var datos = data.map(function (elemento) {
      return elemento.CantidadDonaciones;
    });
  
    // Configuración del gráfico de líneas
    var config = {
      type: 'line',
      data: {
        labels: etiquetas,
        datasets: [{
          label: 'Donaciones por Mes',
          data: datos,
          fill: false,
          borderColor: 'rgb(75, 192, 192)', // Color de la línea
          tension: 0.1 // Ajusta la curvatura de la línea
        }]
      },
      options: {
        scales: {
          x: {
            type: 'category',
            position: 'bottom'
          },
          y: {
            min: 0
          }
        }
      }
    };
  
    // Crea el gráfico de líneas
    var myChart = new Chart(ctx, config);
  }
  