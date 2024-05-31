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


$(document).ready(function() { 
    ajaxVerDonaciones();
  })

  function ajaxVerDonaciones(){
    $.ajax({
        url: "../../controllers/action/verDonaciones.php",
        success: function(result){ 
           insertarDonacionesEnTabla(JSON.parse(result));
        },
    error: function(xhr){
        alert("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
      }});
  }

  //TABLA DINÁMICA DE DONACIONES
  function insertarDonacionesEnTabla(result) {
    let donaciones = '';
    $.each(result, function(i) {
      donaciones += '<tr>' +
        '<td>' +
        '<ul class="list-unstyled ps-0 mb-0">' +
        '<li><p class="text-muted mb-1 text-truncate" style="color: black !important; font-weight: bold;">' + result[i].NombreDonante + '</p></li>' +
        '<li><p class="text-muted mb-1 text-truncate">' + result[i].NombrePrograma + '</p></li>' +
        '<li><p class="text-muted mb-0 text-truncate">Está donando su almuerzo</p></li>' +
        '</ul>' +
        '</td>' +
        '<td style="width: 220px; vertical-align: middle;">' +
        '<h3 class="mb-0 font-size-20"><b>¿Interesado?</b></h3>' +
        '</td>' +
        '<td style="vertical-align: middle;">' +
        '<button type="button" class="btn btn-primary waves-effect waves-light btn-add" data-idDonante="'+ result[i].ID_donante + '" data-idDonacion="'+ result[i].ID_donacionPendiente + '">Adquirir</button>'
      '</td>' +
        '</tr>';
    });
  
    $("#cuerpoTabla").html(donaciones);
    
  }

//VARIABLES--------
var indiceDia = new Date().getDay();// Retorna un número de 0 (Domingo) a 6 (Sábado)
var diasSemana = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
var nombreDiaActual = diasSemana[indiceDia];
//VARIABLES--------

$('#cuerpoTabla').on('click', '.btn-add', function() {
  var indiceDonante = $(this).data('iddonante');
  var indiceDonacion = $(this).data('iddonacion');
  
  $.ajax({
    type: "POST",
    url:  "/../../controllers/action/aceptarDonacion.php", 
    data: { idDia : indiceDia, dia: nombreDiaActual, idDonante: indiceDonante, idDonacion: indiceDonacion}, 
    success: function(response) {
      var responseData = JSON.parse(response);

      if (responseData.status === "success") {
        swal("Recepción exitosa", responseData.message, "success").then(function() {
              location.reload();
          });
      } else {
        swal("Error al realizar la recepción", responseData.message, "error");
      }

    },
    error: function(xhr) {
        console.error("Error en la solicitud AJAX", xhr.statusText);
    }
  });
});

//COMPROBAR CONTRASEÑA PARA PODER DONAR
$('.Donar').on('click', function() {
  var password = $('input[name="pswd"]').val();
  $.ajax({
      type: "POST",
      url: "../../controllers/action/comprobarPswdDonar.php",
      data: { dia: nombreDiaActual, password: password },
      success: function(response) {
        var responseData = JSON.parse(response);

        if (responseData.status === "success") {
          swal("Donación exitosa", responseData.message, "success").then(function() {
                location.reload();
            });
        } else {
          swal("Error al realizar la donación", responseData.message, "error");
        }

      },
      error: function(error) {
        swal("Error", "Ocurrió un error al procesar la solicitud", "error");
      }
  });
});

//CANCELAR DONACIÓN
$('.Cancelar').on('click', function() {
  var password = $('input[name="pswd"]').val();
  $.ajax({
      type: "POST",
      url: "../../controllers/action/cancelarDonacion.php",
      data: { password: password },
      success: function(response) {
        var responseData = JSON.parse(response);

        if (responseData.status === "success") {
          swal("Cancelación exitosa", responseData.message, "success").then(function() {
                location.reload();
            });
        } else {
          swal("Error al cancelar", responseData.message, "error");
        }
        
      },
      error: function(error) {
        swal("Error", "Ocurrió un error al procesar la solicitud", "error");
      }
  });
});
