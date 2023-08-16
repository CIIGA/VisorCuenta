$(document).ready(function () {
  $("#searchButton").click(function () {
    var searchInput = $("#searchInput").val();
    var bd = $("#base").val();
    $.ajax({
      url: "php/actions/expedientesCuentaQuery.php",
      method: "GET",
      data: { searchInput, bd },
      success: function (response) {
        var tablaDiv = document.getElementById("expedienteRow");
        tablaDiv.innerHTML = ""; // Limpiar el contenedor antes de agregar la nueva tabla
        
        const tabla = document.createElement("table");
        tabla.classList.add("table", "table-sm","text-center"); // Agregar la clase "table" de Bootstrap

        const thead = document.createElement("thead");
        thead.classList.add("table-dark"); // Agregar la clase "table-dark" para encabezados oscuros

        const encabezados = ["Cuenta","Gestor", "Fecha Captura", "Expediente"];
        const encabezadosRow = document.createElement("tr");
        encabezados.forEach((encabezado) => {
          const th = document.createElement("th");
          th.classList.add("text-center"); // Agregar clase para centrar el contenido
          th.textContent = encabezado;
          encabezadosRow.appendChild(th);
        });
        thead.appendChild(encabezadosRow);

        const tbody = document.createElement("tbody");

        for (var i = 0; i < response.length; i++) {
          var foto = response[i];
          var fechaCaptura = foto.fechaCaptura;
          var gestor = foto.Nombre;
          var url = foto.urlImagen;
          var cuenta = foto.cuenta;

          const fila = document.createElement("tr");
          const columnas = ["Cuenta","Gestor", "Fecha Captura", "urlPDF"];

          columnas.forEach((columna) => {
            const td = document.createElement("td");
            if (columna === "urlPDF") {
              const pdfIcon = document.createElement("a");
              pdfIcon.href = url;
              pdfIcon.target = "_blank";
              const pdfIconImg = document.createElement("img");
              pdfIconImg.src = "https://img.icons8.com/fluency/24/pdf.png";
              pdfIcon.appendChild(pdfIconImg);
              td.appendChild(pdfIcon);
            } else if (columna === "Cuenta") {
              td.textContent = cuenta;
            } else if (columna === "Gestor") {
              td.textContent = gestor;
            } else {
              td.textContent = fechaCaptura;
            }
            fila.appendChild(td);
          });

          tbody.appendChild(fila);
        }

        tabla.appendChild(thead);
        tabla.appendChild(tbody);

        tablaDiv.appendChild(tabla);
        // Agregar clase "mt-4" al contenedor de la tabla para agregar margen superior
        tablaDiv.classList.add("mt-4");
      },
      error: function () {
        Swal.fire({
          icon: "error",
          title: "Error al consultar datos",
        });
      },
      beforeSend: function () {
        Swal.fire({
          title: "Obteniendo Datos",
          html: "Espere un momento por favor...",
          timer: 0,
          timerProgressBar: true,
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
          willClose: () => {
            return false;
          },
        });
      },
      complete: function () {
        Swal.close();
      },
    });
  });
});
