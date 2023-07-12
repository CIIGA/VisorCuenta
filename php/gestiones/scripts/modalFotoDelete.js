//Escuchamos el evento desde el bton y mandamos los datos de la tabla al modal en el input indicado
$(document).on("click", "#btnmodalfotoDelete", function () {

    var id = $(this).data("iddelete");
    var nombre = $(this).data("nombre");
    var url = $(this).data("urldelete");
    var tipo = $(this).data("tipo");
    var idaspuser = $(this).data("id_gestor");
    var fechaCaptura = $(this).data("fechacaptura");
    var idTarea = $(this).data("idtarea");
    var activo = $(this).data("activo");
    var fechasincronizacion = $(this).data("fechasincronizacion");


    $("#iddelete").val(id);
    $("#nombre").val(nombre);
    $("#idaspuser").val(idaspuser);
    $("#idTarea").val(idTarea);
    $("#fechaCaptura_old").val(fechaCaptura);
    $("#tipo").val(tipo);
    $("#urlImagen_old").val(url);
    $("#Activo_old").val(activo);
    $("#fechaSincronizacion_old").val(fechasincronizacion);
    document.getElementById("fotod").src=url;

 
    
})