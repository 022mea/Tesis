const boton = document.querySelector("#miBoton");
    // Agregar listener
    boton.addEventListener("click", function(evento) {
        // Aquí todo el código que se ejecuta cuando se da click al botón
        validar();
    });


function validar(){
    let nombres = document.getElementById("nombres").value;
    let apellidos = document.getElementById("apellidos").value;
    let correo = document.getElementById("correo").value;
    let cedula = document.getElementById("cedula").value;
    let listaCurso = document.getElementById("id_curso");
    let id_curso = listaCurso.selectedIndex;
    let listaParalelo = document.getElementById("id_paralelo");
    let id_paralelo = listaParalelo.selectedIndex;

    // alert(indiceSeleccionado);
    if(!nombres == "" && !apellidos == "" && !correo == "" && !cedula == "" && !id_curso == 0 && !id_paralelo == 0){
        //Login correcto
    }else{
        alert("Complete todos los campos");
    }
}