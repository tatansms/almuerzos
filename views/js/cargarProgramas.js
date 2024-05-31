$(document).ready(function() {
    ajaxCargarProgramas(); 
});

function ajaxCargarProgramas() {
    $.ajax({
        url: "/../../controllers/actionadmin/verProgramas.php", 
        success: function(result) {
            console.log(result)
            insertarProgramasEnSelect(JSON.parse(result));
        },
        error: function(xhr) {
            console.error("Ocurrió un error: " + xhr.status + " " + xhr.statusText);
        }
    });
}

function insertarProgramasEnSelect(programas) {
    var selectPrograma = $(".programaSelect"); 

    programas.forEach(function(programa) {
        var option = $("<option></option>")
            .attr("value", programa.ID_programa)
            .text(programa.nombre);
        selectPrograma.append(option);
    });
}


