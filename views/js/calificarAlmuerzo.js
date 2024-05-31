let estrellaSeleccionada = false;
let calificacion = 0;

$(document).ready(function() {
    $(document).on('click', '.btnAbrirModal', function() {
        var idAlmuerzo = $(this).data('idalmuerzo');
        // ID del almuerzo en un campo oculto del modal.
        $('#modalCalificar').data('idAlmuerzo', idAlmuerzo);
        $('#modalCalificar').modal('show');
    });

    $('.fa-star').click(function() {
        var contador = $(this).attr('id');
        if (estrellaSeleccionada && contador === '1') {
            desmarcarEstrellas();
        } else {
            estrellaSeleccionada = true;
            calificar(contador);
            calificacion = contador;
        }
    });

    $('#btnEnviarCalificacion').click(function() {
        var idAlmuerzo = $('#modalCalificar').data('idAlmuerzo'); 
        if (estrellaSeleccionada) {
            enviarCalificacion(idAlmuerzo, calificacion);
        } else {
            swal("Calificación incompleta", "Seleccione una calificación", "error");
        }
    });

    $('#modalCalificar').on('hidden.bs.modal', function() {
        desmarcarEstrellas();
        $('#descripcion').val('');
    });
});

function desmarcarEstrellas() {
    for (let i = 0; i < 5; i++) {
        document.getElementById((i + 1)).style.color = "black";
    }
    estrellaSeleccionada = false;
}

function calificar(contador) {
    for (let i = 0; i < 5; i++) {
        if (i < contador) {
            document.getElementById((i + 1)).style.color = "orange";
        } else {
            document.getElementById((i + 1)).style.color = "black";
        }
    }
}

function enviarCalificacion(idAlmuerzo, calificacion) {
    var descripcion = document.getElementById("descripcion").value;
    $.ajax({
        url: "../../controllers/action/calificarAlmuerzo.php",
        method: 'POST',
        data: { 
            idAlmuerzo: idAlmuerzo,
            calificacion: calificacion,
            descripcion: descripcion },
        success: function(response) {
            var responseData = JSON.parse(response);
            if (responseData.status === "success") {
              swal("Calificación exitosa", responseData.message, "success").then(function() {
                    location.reload();
                });
            } else {
              swal("Error al calificar", responseData.message, "error");
            }
        },
        error: function(err) {
            console.error('Error:', err);
        }
    });
}