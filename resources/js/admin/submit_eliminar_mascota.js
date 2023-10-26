import Swal from "sweetalert2";

const btn_eliminar_mascota = document.getElementById("btn_eliminar_mascota");

btn_eliminar_mascota.addEventListener('click', (e) => {

    e.preventDefault();

    Swal.fire({
        title: '¿Está segura/o que desea eliminar este registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            btn_eliminar_mascota.form.submit();
        }
    })

    /*
    let confirmacion = confirm('¿Está segura/o que desea eliminar este registro?');

    if(confirmacion){
        btn_eliminar_mascota.form.submit();
    }
    */

});