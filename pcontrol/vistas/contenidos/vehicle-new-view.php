<div class="p-4">
    <div class="bg-white w-full rounded-md border-b
                            shadow-xl">
        <div class="w-full rounded-t-md bg-cyan-600 h-3
                                mb-2">

        </div>
        <form action="<?php echo SERVERURL; ?>/ajax/ajax.php" method="POST" data-form="save" class="FormularioAjax pb-8 pt-2 px-2">
            <input type="hidden" name="idTrabajador" value="<?php echo $_SESSION['SRM_idTrabajador']; ?>">
            <h1 class="text-lg font-semibold uppercase">Nuevo Vehiculo
            </h1>
            <p class="text-sm text-gray-500 px-1
                                    text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nostrum sed ut? Maiores tempore doloribus adipisci! Eligendi suscipit eaque eveniet, dolor aperiam sunt delectus iusto cum aut officiis eius natus.
            </p>
            <hr>
            <div class="px-2 space-y-4 mt-2">
                <div class="grid w-full">
                    <label for="newModelo" class="text-gray-500
                                            text-base">Modelo <span class="text-red-600">*</span></label>
                    <input class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" type="text" name="newModelo" id="newModelo" required>
                </div>
                <div class="grid w-full">
                    <label for="newAño" class="text-gray-500
                                            text-base">Año <span class="text-red-600">*</span></label>
                    <input class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" type="number" min="<?php echo date('Y') - 6; ?>" value="<?php echo date('Y'); ?>" name="newAño" id="newAño" required>
                </div>
                <div class="grid w-full">
                    <label for="newMarca" class="text-gray-500
                                            text-base">Marca <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newMarca" id="newMarca" required>
                        <option value="" disabled>Seleccione una marca</option>
                        <option value="Honda" selected>Honda</option>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newCategoria" class="text-gray-500
                                            text-base">Categoria <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newCategoria" id="newCategoria" required>
                        <option value="" selected disabled>Seleccione una categoria</option>
                        <?php echo $func->controlador_del_combo_categoria(); ?>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newColor" class="text-gray-500
                                            text-base">Color <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newColor" id="newColor" required>
                        <option value="" selected disabled>Seleccione un color</option>
                        <?php echo $func->controlador_del_combo_color(); ?>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newCilindrada" class="text-gray-500
                                            text-base">Cilindrada <span class="text-red-600">*</span></label>
                    <input type="number" step="0.01" min="0" class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newCilindrada" id="newCilindrada" required>
                </div>
                <div class="grid w-full">
                    <label for="newTipoTrnasmision" class="text-gray-500
                                            text-base">Tipo Transmision <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newTipoTrnasmision" id="newTipoTrnasmision" required>
                        <option value="" selected disabled>Seleccione un tipo</option>
                        <?php echo $func->controlador_del_combo_tipotransmision(); ?>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newElectrico" class="text-gray-500
                                            text-base">Encendido Electrico <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newElectrico" id="newElectrico" required>
                        <option value="" selected disabled>Seleccione un una opcion</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newManual" class="text-gray-500
                                            text-base">Encendido Manual <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newManual" id="newManual" required>
                        <option value="" selected disabled>Seleccione un una opcion</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newTipoMotor" class="text-gray-500
                                            text-base">Tipo Motor <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newTipoMotor" id="newTipoMotor" required>
                        <option value="" selected disabled>Seleccione un tipo</option>
                        <?php echo $func->controlador_del_combo_tipomotor(); ?>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newDelantero" class="text-gray-500
                                            text-base">Tipo Freno Delantero <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newDelantero" id="newDelantero" required>
                        <option value="" selected disabled>Seleccione un tipo</option>
                        <?php echo $func->controlador_del_combo_tipofreno() ?>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newTrasero" class="text-gray-500
                                            text-base">Tipo Freno Trasero <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newTrasero" id="newTrasero" required>
                        <option value="" selected disabled>Seleccione un tipo</option>
                        <?php echo $func->controlador_del_combo_tipofreno() ?>
                    </select>
                </div>
                <div class="grid w-full">
                    <label for="newPeso" class="text-gray-500
                                            text-base">Peso (Kg)<span class="text-red-600">*</span></label>
                    <input type="number" step="0.01" min="0" class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newPeso" id="newPeso" required>
                </div>
                <div class="grid w-full">
                    <label for="newVelocidad" class="text-gray-500
                                            text-base">Velcidad Maxima (Km/h) <span class="text-red-600">*</span></label>
                    <input type="number" step="0.01" min="0" class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newVelocidad" id="newVelocidad" required>
                </div>
                <div class="grid w-full">
                    <label for="newAceleracion" class="text-gray-500
                                            text-base">Aceleracion (0-100) <span class="text-red-600">*</span></label>
                    <input type="number" step="0.01" min="0" class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newAceleracion" id="newAceleracion" required>
                </div>
                <div class="grid w-full">
                    <label for="newPrecio" class="text-gray-500
                                            text-base">Precio (S/.) <span class="text-red-600">*</span></label>
                    <input type="number" step="0.01" min="0" class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newPrecio" id="newPrecio" required>
                </div>
                <div class="grid w-full">
                    <label for="newDescripcion" class="text-gray-500
                                            text-base">Descripcion <span class="text-red-600">*</span></label>
                    <textarea class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newDescripcion" id="newDescripcion" required></textarea>
                </div>
                <div class="grid w-full">
                    <label for="newEstado" class="text-gray-500
                                            text-base">Publicar moto? <span class="text-red-600">*</span></label>
                    <select class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="newEstado" id="newEstado" required>
                        <option value="" selected disabled>Seleccione un una opcion</option>
                        <option value="activo">Si</option>
                        <option value="inactivo">No</option>
                    </select>
                </div>
                <div class="w-full flex justify-center
                                        space-x-2">
                    <button type="reset" class="bg-gray-400
                                            px-4 py-1 text-white rounded-lg
                                            hover:bg-gray-500 w-full sm:w-96
                                            md:w-64">Limpiar</button>
                    <button type="submit" class="bg-cyan-600
                                            px-4 py-1 text-white rounded-lg
                                            hover:bg-cyan-700 w-full sm:w-96
                                            md:w-64">Registra Vehiculo</button>
                </div>
            </div>
        </form>
        <div class="w-full rounded-b-md bg-cyan-600 h-3
                                mt-2">

        </div>
    </div>
</div>