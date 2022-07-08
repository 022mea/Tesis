const boton = document.querySelector("#loginBtn");
    // Agregar listener
    boton.addEventListener("click", function(evento) {
        // Aquí todo el código que se ejecuta cuando se da click al botón
        validar();
    });


function validar(){
    let descripcion = document.getElementById("descripcion").value;

    // alert(indiceSeleccionado);
    if(!descripcion == ""){
        //Login correcto
    }else{
        alert("Ingresa un paralelo");
    }
}