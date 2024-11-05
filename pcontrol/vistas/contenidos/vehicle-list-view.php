<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-2">
    <?php echo $func->controlador_que_lista_motos_registradas(); ?>
    <script>
        base_url = "<?php echo SERVERURL ?>";
    </script>
    <script src="<?php echo SERVERURL ?>vistas/script/list_motos.js"></script>
</div>