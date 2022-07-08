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
    let password = document.getElementById("password").value;
    let tipoUsuario = document.getElementById("id_tipo_usuario");
    let id_tipo_usuario = tipoUsuario.selectedIndex;


    // alert(indiceSeleccionado);
    if(!nombres == "" && !apellidos == "" && !correo == "" && !password == "" && !id_tipo_usuario == 0){
        //Login correcto
    }else{
        alert("Complete todos los campos");
    }
}