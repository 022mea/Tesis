// const boton = document.querySelector("#miBoton");
//     // Agregar listener
// boton.addEventListener("click", function(evento) {
//     // Aquí todo el código que se ejecuta cuando se da click al botón
//     // validar();
// });

// alert("Complete todos los campos");

$("#formulario").on('submit', function(evt){
    evt.preventDefault();  
    // tu codigo aqui
    alert("Alert 2");
 });


// $(".formulario").on('submit', function(evt){
//     evt.preventDefault();  
//     // tu codigo aqui
//     Swal.fire({
//         icon: 'error',
//         title: '¡Error!',
//         text: '¡Completa todos los campos!',
//     })

//     alert("Alert 2");
//  });



function validar(){
    let nombres = document.getElementById("nombres").value;
    let apellidos = document.getElementById("apellidos").value;
    let cedula = document.getElementById("cedula").value;
    let edad = document.getElementById("edad").value;
    let telefono = document.getElementById("telefono").value;
    let direccion = document.getElementById("direccion").value;
    let correo = document.getElementById("correo").value;
    let listaCurso = document.getElementById("id_curso");
    let id_curso = listaCurso.selectedIndex;
    let listaParalelo = document.getElementById("id_paralelo");
    let id_paralelo = listaParalelo.selectedIndex;

    // alert(indiceSeleccionado);
    if(!nombres == "" && !apellidos == "" && !cedula == "" && !edad == "" && !telefono == "" && !direccion == "" && !correo == "" && !id_curso == 0 && !id_paralelo == 0){
        //correcto
    }else{
        alert("Complete todos los campos");

        $("#formulario").on('submit', function(evt){
            evt.preventDefault();  
            // tu codigo aqui
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '¡Completa todos los campos!',
            })

            alert("Alert 2");
         });

         alert("Alert 2");
        
        // $('#formulario').submit(function(e){
        //     e.preventDefault();

        //     Swal.fire({
        //         icon: 'error',
        //         title: '¡Error!',
        //         text: '¡Completa todos los campos!',
        //     })
        // });

        // $(".formulario").submit(function(e){

        //     e.preventDefault();
       
        //     //resto código   
        //     Swal.fire({
        //         icon: 'error',
        //         title: '¡Error!',
        //         text: '¡Completa todos los campos!',
        //     })
        // });
    }
}