<script>
    document.getElementById('exit-sesion').addEventListener('click', closeSesion)

    function closeSesion() {
        Swal.fire({
            title: '¿Estás seguro de cerrar la sesión?',
            text: "Está a punto de cerrar la sesión y salir del sistema.",
            type: 'question',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, salir!',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.value) {
                let url = '<?php echo SERVERURL; ?>/ajax/ajax.php';
                let token = '<?php echo $func->encryption($_SESSION['SRM_Token']) ?>';
                let usuario = '<?php echo $func->encryption($_SESSION['SRM_Usuario']) ?>';
                let datos = new FormData();
                datos.append('token', token);
                datos.append('usuario', usuario);
                fetch(url, {
                        method: 'POST',
                        body: datos
                    })
                    .then(respuesta => respuesta.json())
                    .then(respuesta => {
                        return alertas_ajax(respuesta);
                    });
            }
        });
    }
    // document.getElementById("#closeSession").onclick(closeSesion(e));
</script>