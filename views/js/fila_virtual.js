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




function aumentarTurno() {
    let numeroTurno = document.querySelector('.Turno h1');
    let turnoActual = parseInt(numeroTurno.textContent);
    numeroTurno.textContent = turnoActual + 1;
}
  
function disminuirTurno() {
    
    let numeroTurno = document.querySelector('.Turno h1');
  
    let turnoActual = parseInt(numeroTurno.textContent);
    if (turnoActual > 0) {
      numeroTurno.textContent = turnoActual - 1;
    }
}

function disminuirCada5Segundos() {
    setInterval(() => {
      // Obtener el elemento que muestra el número de turno
      let numeroTurno = document.querySelector('.Turno h1');
  
      // Obtener el número actual de turno y disminuirlo en uno si es mayor a cero
      let turnoActual = parseInt(numeroTurno.textContent);
      if (turnoActual > 0) {
        numeroTurno.textContent = turnoActual - 1;
      }
    }, 5000); // 30 segundos en milisegundos
}

$('.Ingresar_Fila').on('click', function() {
    $.ajax({
        type: "POST",
        url: "../../controllers/action/ingresarAFila.php",
        success: function(response) {
          var responseData = JSON.parse(response);
    
          if (responseData.status === "success") {
            aumentarTurno(); 
            swal("Ingreso exitoso", responseData.message, "success");
          } else {
            swal("Error Ingresar", responseData.message, "error");
          }
        },
        error: function(error) {
          swal("Error", "Ocurrió un error al procesar la solicitud", "error");
        }
    });
});


$('.Cancelar_turno').on('click', function() {
    $.ajax({
        type: "POST",
        url: "../../controllers/action/cancelarTurno.php",
        success: function(response) {
          var responseData = JSON.parse(response);
    
          if (responseData.status === "success") {
            disminuirTurno();
            swal("Cancelación", responseData.message, "success")
          } else {
            swal("Error", responseData.message, "error");
          }
        },
        error: function(error) {
          swal("Error", "Ocurrió un error al procesar la solicitud", "error");
        }
    });
});
  


  