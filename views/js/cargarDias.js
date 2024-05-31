$(document).ready(function() {
    ajaxCargarDias(); 
});

function ajaxCargarDias() {
    $.ajax({
        url: "/../../controllers/action/verDias.php", 
        success: function(result) {
            console.log(result)
            insertarDiasEnSelect(JSON.parse(result));
        },
        error: function(xhr) {
            console.error("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
        }
    });
}

function insertarDiasEnSelect(dias) {
    var selectDia = $(".diaSelect"); 

    dias.forEach(function(dia) {
        var option = $("<option></option>")
            .attr("value", dia.ID_dia)
            .text(dia.nombre);
        selectDia.append(option);
    });
}


