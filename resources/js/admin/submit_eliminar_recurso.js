import Swal from "sweetalert2";

const btn_eliminar_recurso = document.querySelectorAll(".btn_eliminar_recurso");

btn_eliminar_recurso.forEach(btn => {
    btn.addEventListener('click', (e) => {

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
                btn.form.submit();
            }
        })
    
    });
});