<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-2">
    <?php echo $func->controlador_que_lista_motos_registradas(); ?>
    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <!-- Header del Modal -->
            <div class="modal-header">
                <span id="closeModalBtn" class="close-btn">&times;</span>
                <h2></h2>
            </div>

            <!-- Body del Modal -->
            <div class="modal-body">
                <div class="form-container">
                    <h2>Informacion de la moto</h2>
                </div>
                <form id="formMoto">
                    <input type="hidden" id="txtIdMoto" name="txtIdMoto" />
                    <div class="form-group">
                        <label for="txtModelo">Modelo</label>
                        <input type="text" id="txtModelo" name="txtModelo" class="form-control" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="txtYear">Año</label>
                        <input type="number" min="2020" id="txtYear" name="txtYear" class="form-control" placeholder="Modelo">
                    </div>
                    <div class="form-group">
                        <label for="txtMarca">Marca</label>
                        <input type="text" id="txtMarca" name="txtMarca" class="form-control" placeholder="Marca">
                    </div>
                    <div class="form-group">
                        <label for="txtPrecio">Precio</label>
                        <input type="number" min="0" step="0.01" id="txtPrecio" name="txtPrecio" class="form-control" placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <label for="txtDescripcion">Descripción</label>
                        <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" placeholder="Descripcion">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>

            <!-- Footer del Modal -->
            <div class="modal-footer">

            </div>
        </div>
    </div>
    <script>
        base_url = "<?php echo SERVERURL ?>";
    </script>
    <script src="<?php echo SERVERURL ?>vistas/script/list_motos.js"></script>
</div>