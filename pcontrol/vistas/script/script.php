<script>
    const item = document.querySelectorAll(".item")
    item.forEach(element => {
        element.addEventListener('click', function() {
            var menu = element.nextElementSibling
            if (menu.classList.contains('group-item')) {
                menu.classList.toggle('hidden')
            } else {
                console.log('Ocurrio un error inesperado, al momento de crear el dropdown')
            }
        })
    });
    const open_toggle = document.querySelector('.open-toggle')
    open_toggle.addEventListener('click', function() {
        var toggle_menu = document.querySelector('.toggle-menu')
        toggle_menu.classList.add('open-toggle-left-transition')
        toggle_menu.classList.toggle('hidden')
    })
    const close_toggle = document.querySelector('.close-toggle')
    close_toggle.addEventListener('click', function() {
        var toggle_menu = document.querySelector('.toggle-menu')
        toggle_menu.classList.toggle('hidden')
    })
</script>
<script src="<?php echo SERVERURL ?>vistas/script/alertas.js"></script>