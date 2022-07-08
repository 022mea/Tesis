const boton = document.querySelector("#miBoton");
// Agregar listener
boton.addEventListener("click", function (evento) {
    // Aquí todo el código que se ejecuta cuando se da click al botón
    validar();
});

function validar() {

    let listaCurso = document.getElementById("id_curso");
    let id_curso = listaCurso.selectedIndex;
    let listaParalelo = document.getElementById("id_paralelo");
    let id_paralelo = listaParalelo.selectedIndex;
    let jornada = document.getElementById("jornada").value;

    console.log("Curso: " + id_curso);
    console.log("Paralelo: " + id_paralelo);
    console.log("Jornada: " + jornada);
    // alert(indiceSeleccionado);
    if (id_curso === 0 || id_paralelo === 0 || jornada === "0") {
        console.log("Incorrecto");
        const form = document.getElementById("formulario-curso");
        form.addEventListener("submit", function (event) {
            //  alert("Hola Mundo, submit");
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '¡Seleccione un curso, un paralelo y una jornada!',
            })
            setTimeout(function () {
                location.reload();
            }, 2000);
        });

        // location.reload();

        // let refresh = document.getElementById('refresh');
        // refresh.addEventListener('click', _ => {
        //     location.reload();
        // })

    } else {
        //Login correcto
        console.log("Correcto");
    }
}




