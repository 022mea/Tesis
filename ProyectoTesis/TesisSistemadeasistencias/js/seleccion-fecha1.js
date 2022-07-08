const boton2 = document.querySelector("#miBotonFecha");
// Agregar listener
boton2.addEventListener("click", function (evento) {
    // Aquí todo el código que se ejecuta cuando se da click al botón
    validarFecha();
});

function validarFecha() {
    
    let fecha = document.getElementById("fecha").value;

    if (fecha !== "") {
        // alert("Fecha 1: " + fecha);
    } else {
        alert("Seleccione una fecha");
    }

}




