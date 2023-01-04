<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">
    <title>Insertar</title>
</head>

<body>

    <?php
    require '../../vendor/autoload.php';

    $codigo = obtener_post('codigo');
    $descripcion = obtener_post('descripcion');
    $precio = obtener_post('precio');
    $stock = obtener_post('stock');

    if (isset($codigo) && $codigo != '' && isset($descripcion) && $descripcion != '' && isset($precio) && $precio != '' && isset($stock) && $stock != '') {
        \App\Tablas\Articulo::insertar($codigo, $descripcion, $precio, $stock);
        $_SESSION['exito'] = "El articulo se ha añadido correctamente.";
        return volver_admin();
    }
    ?>

    <form class="mt-6 mr-96 ml-96" action="" method="POST">
        <div class="mb-6">
            <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Código</label>
            <input type="text" id="codigo" name="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            <label for="descripcion" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Descripción</label>
            <input type="text" id="descripcion" name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            <label for="precio" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Precio</label>
            <input type="text" id="precio" name="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            <label for="stock" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Stock</label>
            <input type="text" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
        </div>

        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Registrar</button>
    </form>

    <script src="../js/flowbite/flowbite.js"></script>

</body>

</html>