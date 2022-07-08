const boton = document.querySelector("#miBoton");
    // Agregar listener
    // boton.addEventListener("click", function(evento) {
    //     // Aquí todo el código que se ejecuta cuando se da click al botón
    //     // validar();
    //     // alert("Hola Mundo");
    // });


function validar(){
    // let presenteCheck = document.getElementById("presente").value;
    // let ausente = document.getElementById("ausente").value;
    // let atraso = document.getElementById("atraso").value;

    // alert(presente);

    // // alert(indiceSeleccionado);
    // if(!descripcion == ""){
    //     //Login correcto
    // }else{
    //     alert("Complete todos los campos");
    // }

    Swal.fire({
        icon: 'error',
        title: '¡Error!',
        text: '¡Completa todos los campos!',
    })

    let presenteCheck = document.getElementById('presente');
    let ausenteCheck = document.getElementById('ausente');
    let atrasoCheck = document.getElementById('atraso');
    // var msg = document.getElementById('msg');

    // if(presenteCheck.checked){
    //     ausenteCheck.checked = false;
    //     atrasoCheck.checked = false;
    // } else if(ausenteCheck.checked){
    //     presenteCheck.checked = false;
    //     atrasoCheck.checked = false;
    // } else if(atrasoCheck.checked){
    //     presenteCheck.checked = false;
    //     ausenteCheck.checked = false;
    // }

    alert('Presente: ' + presenteCheck.checked + '\nAusente: ' + ausenteCheck.checked + '\nAtraso: ' + atrasoCheck.checked);

    // miCheckbox.addEventListener('click', function() {
    //     if(miCheckbox.checked) {
    //     msg.innerText = 'El elemento está marcado';
    //     } else {
    //     msg.innerText = 'Ahora está desmarcado';
    //     }
    // });
}