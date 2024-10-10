<?php
$url = explode('/', $_GET['views']);
$idMotos = $url[1];
?>
<div class="p-4">
    <div class="bg-white w-full rounded-md border-b
                            shadow-xl">
        <div class="w-full rounded-t-md bg-cyan-600 h-3
                                mb-2">

        </div>
        <form action="<?php echo SERVERURL ?>ajax/ajax.php" method="POST" data-form="save" enctype="multipart/formdata" class="FormularioAjax pb-8 pt-2 px-2">
            <input type="hidden" name="idMotoIMG" value="<?php echo $idMotos; ?>">
            <h1 class="text-lg font-semibold uppercase">Upload Imagen
            </h1>
            <p class="text-sm text-gray-500 px-1
                                    text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nostrum sed ut? Maiores tempore doloribus adipisci! Eligendi suscipit eaque eveniet, dolor aperiam sunt delectus iusto cum aut officiis eius natus.
            </p>
            <hr>
            <div class="px-2 space-y-4 mt-2">
                <div class="grid w-full">
                    <label for="imagenMT" class="text-gray-500
                                            text-base">Imagen <span class="text-red-600">*</span></label>
                    <input type="file" class="w-full border-b rounded-lg
                                            outline-none px-2 h-10 bg-gray-50
                                            hover:bg-gray-100 hover:shadow-md" name="imagenMT" id="" required>
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
                                            md:w-64">Upload</button>
                </div>
            </div>
        </form>
        <div class="w-full rounded-b-md bg-cyan-600 h-3
                                mt-2">

        </div>
    </div>
</div>