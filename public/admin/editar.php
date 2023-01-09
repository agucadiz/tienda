<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/output.css" rel="stylesheet">
  <title>Modificar</title>
</head>

<body>
  <?php
  require '../../vendor/autoload.php';

  $pdo = conectar();

  $id = obtener_get('id');
  $descripcion = obtener_get('descripcion');
  $precio = obtener_get('precio');
  $stock = obtener_get('stock');
  $descripcion2 = obtener_post('descripcion2');
  $precio2 = obtener_post('precio2');
  $stock2 = obtener_post('stock2');

  if (isset($descripcion2) && $descripcion2 != '' && isset($precio2) && $precio2 != '' && isset($stock2) && $stock2 != '') {
    \App\Tablas\Articulo::modificar($id, $descripcion2, $precio2, $stock2, $pdo);
    $_SESSION['exito'] = "El articulo se ha modificado correctamente.";
    return volver_admin();
  }
  ?>

  <div class="container mx-auto">
    <?php require '../../src/_menu.php' ?>
    
    <form class="mt-5 mr-96 ml-96" action="" method="POST">
      <div class="mb-6">
        <label for="descripcion2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
          Descripción</label>
        <input type="text" id="descripcion2" name="descripcion2" value="<?= $descripcion ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">

        <label for="precio2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
          Precio</label>
        <input type="text" id="precio2" name="precio2" value="<?= $precio ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">

        <label for="stock2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
          Stock</label>
        <input type="text" id="stock2" name="stock2" value="<?= $stock ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
      </div>

      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Editar</button>
    </form>
  </div>

  <script src="../js/flowbite/flowbite.js"></script>

</body>

</html>