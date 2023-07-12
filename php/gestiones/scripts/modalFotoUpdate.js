//Escuchamos el evento desde el bton y mandamos los datos de la tabla al modal en el input indicado
$(document).on("click", "#btnmodalfotoupdate", function () {
  var id = $(this).data("id");
  var tipo = $(this).data("tipo");
  var fecha = $(this).data("fecha");
  var nombre = $(this).data("nombre");
  var url = $(this).data("url");
  $("#idm").val(id);
  // $("#labeltipo").val(tipo);
  $("#fecha").val(fecha);
  $("#nombre_old").val(nombre);
  $("#tipo_old").val(tipo);
  $("#url_old").val(url);

  
//creamos una variable y la instanciamos al id del combobox
  var combobox = document.getElementById("comboTipos");
  combobox.innerHTML="";//instanciamos una variable al primer option del combo
  // Accede a la primera opción (índice 0)
  // var opcion = combobox.options[0]; 
  //a la primera opcion le damos el tipo que ya se tiene en el registro
  // opcion.text = tipo;
  var opciones = [tipo,"Evidencia", "Predio", "Acta circunstanciada"];//creamos un array con las diferentes opciones

    for (var i = 0; i < opciones.length; i++) {//declaracion de un ciclo para recorrer las opciones e insertarlo
        var opcion = document.createElement("option");//creamos un elemento de tipo opcion
         //en ese elemento añadimos la primara opcion
         opcion.text = opciones[i];
        if (i == 0) {//validamos que si la opcion es igual a la que ya se tiene no haga nada
          combobox.appendChild(opcion);//en caso contrario carga la opcion al elemento
        } else {
          if (opciones[i]==opciones[0]) {
            
          } else {
          combobox.appendChild(opcion);
          }
        
        }
    
      }
  
});
