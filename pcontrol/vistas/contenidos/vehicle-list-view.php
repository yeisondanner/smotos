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
                        <label for="slctCategoria">Categoria</label>
                        <select name="slctCategoria" id="slctCategoria" class="form-control">
                            <option value="" disabled selected>Seleccion una opción</option>
                            <?php echo $func->controlador_del_combo_categoria(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slctColor">Color</label>
                        <select name="slctColor" id="slctColor" class="form-control">
                            <option value="" disabled selected>Seleccion una opción</option>
                            <?php echo $func->controlador_del_combo_color(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtCilindrada">Cilindrada</label>
                        <input type="number" min="0" id="txtCilindrada" name="txtCilindrada" class="form-control" placeholder="Cilindrada">
                    </div>
                    <div class="form-group">
                        <label for="slctTipoTransmision">Tipo transmision</label>
                        <select name="slctTipoTransmision" id="slctTipoTransmision" class="form-control">
                            <option value="" disabled selected>Seleccion una opción</option>
                            <?php echo $func->controlador_del_combo_tipotransmision(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slctEncendidoElectrico">Encendido electrico</label>
                        <select class="form-control" name="slctEncendidoElectrico" id="slctEncendidoElectrico">
                            <option value="" selected disabled>Seleccione un una opcion</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slctEncendidoManual">Encendido manual</label>
                        <select class="form-control" name="slctEncendidoManual" id="slctEncendidoManual">
                            <option value="" selected disabled>Seleccione un una opcion</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slctTipoMotor">Tipo Motor</label>
                        <select name="slctTipoMotor" id="slctTipoMotor" class="form-control">
                            <option value="" disabled selected>Seleccion una opción</option>
                            <?php echo $func->controlador_del_combo_tipomotor(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="scltFrenoD">Freno Delantero</label>
                        <select name="scltFrenoD" id="scltFrenoD" class="form-control">
                            <option value="" disabled selected>Seleccion una opción</option>
                            <?php echo $func->controlador_del_combo_tipofreno(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="scltFrenoT">Freno Trazero</label>
                        <select name="scltFrenoT" id="scltFrenoT" class="form-control">
                            <option value="" disabled selected>Seleccion una opción</option>
                            <?php echo $func->controlador_del_combo_tipofreno(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtPeso">Peso KG.</label>
                        <input type="number" min="0" step="0.01" id="txtPeso" name="txtPeso" class="form-control" placeholder="Peso KG.">
                    </div>
                    <div class="form-group">
                        <label for="txtAceleracion">Aceleracion</label>
                        <input type="number" min="0" step="0.01" id="txtAceleracion" name="txtAceleracion" class="form-control" placeholder="S/KM">
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