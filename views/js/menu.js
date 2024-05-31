// Obtén el nombre completo del día actual
jQuery(function($) {
    $(window).on('scroll', function() {
    if ($(this).scrollTop() >= 200) {
      $('.navbar').addClass('fixed-top');
    } else if ($(this).scrollTop() == 0) {
      $('.navbar').removeClass('fixed-top');
    }
  });
  
  function adjustNav() {
    var winWidth = $(window).width(),
      dropdown = $('.dropdown'),
      dropdownMenu = $('.dropdown-menu');
    
    if (winWidth >= 768) {
      dropdown.on('mouseenter', function() {
        $(this).addClass('show')
          .children(dropdownMenu).addClass('show');
      });
      
      dropdown.on('mouseleave', function() {
        $(this).removeClass('show')
          .children(dropdownMenu).removeClass('show');
      });
    } else {
      dropdown.off('mouseenter mouseleave');
    }
  }
  
  $(window).on('resize', adjustNav);
  
  adjustNav();
  }); 



var diasSemana = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
var hoy = new Date().getDay(); // Retorna un número de 0 (Domingo) a 6 (Sábado)
var nombreDiaActual = diasSemana[hoy];
console.log(nombreDiaActual);

$(document).ready(function() {
    // Función para hacer la solicitud AJAX
    function cargarAlmuerzos(dia) {
        $.ajax({
            type: "POST",
            url: "/../../controllers/action/listaralmuerzo.php",
            data: { dia: dia },
            dataType: "json",
            success: function(response) {
                $("#row").empty();

                for (var i = 0; i < response.length; i++) {
                    var almuerzo = response[i];
                    console.log(almuerzo);
                    var html = '<div class="col-md-6">' +
                    '    <div class="timetable-item">' +
                    '        <div class="timetable-item-main">' +
                    '           <div class="timetable-item-img">'+
                    '              <img src="https://www.bootdey.com/image/100x80/FFB6C1/000000" alt="Contemporary Dance">'+
                    '           </div>'+
                    '           <div class="timetable-item-time">' + almuerzo.nombre + '</div>' +
                    '           <div class="timetable-item-name">' + almuerzo.descripcion + '</div>' +
                    '           <div class="timetable-item-promedio">Promedio de calificación: ' + almuerzo.promedioCalificacion + '</div>' +
                    '           <div class="d-flex justify-content-center mt-3">'+
                    '              <button class="btn btn-primary btnAbrirModal" data-idAlmuerzo="'+ almuerzo.ID_almuerzo + '">Calificar</button>' +
                    '           </div>'+
                    '        </div>' +
                    '    </div>' +
                    '</div>';

                    $("#row").append(html);
                }
            },
            error: function(error) {
                console.error("Error en la solicitud AJAX", error);
            }
        });
    }
    $(".dia").each(function() {
        if ($(this).text() === nombreDiaActual) {
            $(this).addClass("active");
            cargarAlmuerzos(nombreDiaActual);
        }
    });
    
    // Al hacer clic en un enlace
    $(".dia").on("click", function() {
        $(".dia").removeClass("active");
        $(this).addClass("active");

        var dia = $(this).text().trim();
        console.log(dia);
        cargarAlmuerzos(dia);
    });
});



// Agrega la clase "activo" al elemento del menú que coincide con el día actual
