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

document.getElementById('btn-edit-profile').addEventListener('click', function () {
    var panel = document.getElementById('win-fixed');
    var overlay = document.getElementById('overlay');

    panel.style.display = 'block';
    overlay.style.display = 'block';
});

// También, puedes cerrar el panel al hacer clic fuera de él
document.getElementById('overlay').addEventListener('click', function() {
    var panel = document.getElementById('win-fixed');
    var overlay = document.getElementById('overlay');

    panel.style.display = 'none';
    overlay.style.display = 'none';
});
$(document).ready(function () {
    $(".dropdown").hover(
        function () {
            $(this).find(".dropdown-content").stop(true, true).slideDown(400);
        },
        function () {
            $(this).find(".dropdown-content").stop(true, true).slideUp(400);
        }
    );
});
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
            if(result.msg == 'Las contraseñas no coinciden'){
  
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
    $('#delete').click(function () {
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
              url: '/../../controllers/action/deleteaccount.php',
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
  });