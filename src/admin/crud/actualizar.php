<?php
$crud=true;
ob_start();

$id = $_GET['id'] ?? null;
$id = filter_var($id, FILTER_VALIDATE_INT);

// Validar el ID
if (!$id) {
    header('Location: ../../../src');
    exit;
}

try {
    require '../../../conexiones/coneccion_bd.php';

    // Consultar información de la moto
    $sql = "SELECT * FROM motos WHERE id = $id;";
    $consulta = mysqli_query($coneccion, $sql);
    $motos = mysqli_fetch_assoc($consulta);

    // Verificar si la moto existe
    if (!$motos) {
        header('Location: ../../../src');
        exit;
    }

    // Consultar las marcas
    $sql = "SELECT * FROM marcas;";
    $consulta_marcas = mysqli_query($coneccion, $sql);

} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
    exit;
}


$alerta = [];

$moto = $motos['nombre'] ?? '';
$marcaId = $motos['marca'] ?? '';
$modelo = $motos['modelo'] ?? '';
$precio = $motos['precio'] ?? '';
$imagen = $motos['imagen'] ?? '';
$reseña = $motos['reseña'] ?? '';
$documentos = $motos['documentos'] ?? '';
$km = $motos['km'] ?? '';
$encendido = $motos['encendido'] ?? '';
$colores = $motos['colores'] ?? '';
$motor = $motos['motor'] ?? '';
$cilindraje = $motos['cilindraje'] ?? '';
$potencia = $motos['potencia'] ?? '';
$torque = $motos['torque'] ?? '';

include '../head.php';
?>

<div class="container w-[90%] lg:w-4/6 mx-auto">
<h2 class="text-center uppercase text-2xl mt-5">Actualizar Anuncio</h2>

<?php foreach ($alerta as $error): ?>
    <div class="bg-red-600 text-white text-center">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endforeach; ?>

<form class="my-10 capitalize border-2 border-gray-600 bg-white py-5 px-10 border-solid" method="POST" enctype="multipart/form-data">
    <fieldset class="flex flex-col ">
        <legend class="text-center md:text-xl uppercase italic text-stone-600 mb-10">Información General de la Moto</legend>

        <label class="text-lg font-bold capitalize" for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre de la moto" value="<?php echo htmlspecialchars($moto); ?>" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2">

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="imagen_actual" value="<?php echo htmlspecialchars($imagen); ?>">

        <label class="text-lg font-bold capitalize mt-7">Marca</label>
        <select name="marca" class="w-1/3 border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2">
            <option>-- Seleccione --</option>
            <?php while ($marca = mysqli_fetch_assoc($consulta_marcas)) : ?>
                <option <?php echo $marcaId === $marca['idmarcas'] ? 'selected' : ''; ?> value="<?php echo $marca['idmarcas']; ?>"> 
                    <?php echo htmlspecialchars($marca['nombre']); ?> 
                </option>
            <?php endwhile; ?>
        </select>

        <label for="modelo" class="text-lg font-bold capitalize mt-7">Modelo</label>
        <input type="number" id="modelo" name="modelo" min="2000" max="2025" step="1" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2 w-1/2" value="<?php echo htmlspecialchars($modelo); ?>">

        <label class="text-lg font-bold capitalize mt-7" for="precio">Precio</label>
        <input type="number" id="precio" name="precio" placeholder="Valor de la moto" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2 w-1/2" value="<?php echo htmlspecialchars($precio); ?>">

        <label class="text-lg font-bold capitalize mt-7 mb-3" for="imagen">Imagen</label>
        <input type="file" id="imagen" accept="image/webp, image/png, image/jpeg" name="imagen">

        <label class="text-lg font-bold capitalize mt-7" for="reseña">Reseña</label>
        <textarea id="reseña" name="reseña" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2"><?php echo htmlspecialchars($reseña); ?></textarea>
    </fieldset>

    <hr class="border-2 border-gray-600 my-5">

    <fieldset class="flex flex-col md:flex-row w-full md:gap-16">
        <legend class="text-center md:text-xl uppercase italic text-stone-600 mb-10">Información Específica de la Moto</legend>

        </fieldset>
        <hr class="border-2 border-gray-600 my-5 ">
        <fieldset class="flex flex-col md:flex-row w-full md:gap-16">
            <legend class="text-center md:text-xl uppercase italic text-stone-600 mb-10">Información especifica de la moto</legend>

            <div class="flex flex-col  w-full ">
                <label class=" font-bold capitalize mt-7" for="potencia">Documentos</label>
                <select name="documentos" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2">
                    <option value="">-- Seleccione --</option>
                    <option <?php echo $documentos=='vencidos' ? 'selected' : ''; ?> value="vencidos">--vencidos--</option>
                    <option <?php echo $documentos=='al_dia' ? 'selected' : ''; ?> value="al_dia">--al dia--</option>


                </select>

                <label class=" font-bold capitalize mt-7" for="km">kilometraje</label>
                <input type="number" id="km" name="km" placeholder="kilometraje" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" min=0 value="<?php echo $km; ?>">

                <label class=" font-bold capitalize mt-7" for="encendido">Encendido</label>
                <select name="encendido" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2">
                    <option   value="">-- Seleccione --</option>
                    <option <?php echo $encendido=='electrico' ? 'selected' : ''; ?> value="electrico">--Electrico--</option>
                    <option <?php echo $encendido=='patada' ? 'selected' : ''; ?> value="patada">--Patada--</option>
                    <option <?php echo $encendido=='electrico-Patada' ? 'selected' : ''; ?> value="electrico-Patada">--Electrico-Patada--</option>
                </select>
                <label class=" font-bold capitalize mt-7" for="color">colores</label>
                <input type="text" id="color" name="color" placeholder="colores de la moto" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" value="<?php echo $colores; ?>">
            </div>
            <div class="flex flex-col  w-full ">

                <label class=" font-bold capitalize mt-7" for="motor">motor</label>
                <input type="text" id="motor" name="motor" placeholder="motor" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" value="<?php echo $motor; ?>">

                <label class=" font-bold capitalize mt-7" for="cilindraje">cilindraje</label>
                <input type="text" id="cilindraje" name="cilindraje" placeholder="cilindraje" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" value="<?php echo $cilindraje; ?>">

                <label class=" font-bold capitalize mt-7" for="cilindraje">Potencia</label>
                <input type="text" id="potencia" name="potencia" placeholder="Potencia maxima" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" value="<?php echo $potencia; ?>">

                <label class=" font-bold capitalize mt-7" for="torque">Torque</label>
                <input type="text" id="torque" name="torque" placeholder="Torque maximo" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" value="<?php echo $torque; ?>">


            </div>



        </fieldset>

    </fieldset>

    <hr class="border-2 border-gray-600 my-5">

    <div class="my-10 flex justify-end gap-3">
        <a href="../main.php" class="bg-red-600 py-2 px-5 text-white uppercase font-bold rounded-lg">Cancelar</a>
        <input type="submit" value="Guardar" class="bg-blue-700 py-2 px-5 text-white uppercase font-bold rounded-lg">
    </div>
</form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../../../conexiones/coneccion_bd.php';

   
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    if (!$id) {
        die('ID inválido.');
    }

    $nombre = mysqli_real_escape_string($coneccion, $_POST['nombre'] ?? '');
    $marca = mysqli_real_escape_string($coneccion, $_POST['marca'] ?? '');
    $modelo = filter_var($_POST['modelo'] ?? null, FILTER_VALIDATE_INT);
    $precio = filter_var($_POST['precio'] ?? null, FILTER_VALIDATE_FLOAT);
    $reseña = mysqli_real_escape_string($coneccion, $_POST['reseña'] ?? '');
    $imagen_actual = $_POST['imagen_actual'] ?? '';
    $documentos = mysqli_real_escape_string($coneccion, $_POST['documentos'] ?? '');
    $km = filter_var($_POST['km'] ?? null, FILTER_VALIDATE_INT);
    $encendido = mysqli_real_escape_string($coneccion, $_POST['encendido'] ?? '');
    $colores = mysqli_real_escape_string($coneccion, $_POST['color'] ?? '');
    $motor = mysqli_real_escape_string($coneccion, $_POST['motor'] ?? '');
    $cilindraje = mysqli_real_escape_string($coneccion, $_POST['cilindraje'] ?? '');
    $potencia = mysqli_real_escape_string($coneccion, $_POST['potencia'] ?? '');
    $torque = mysqli_real_escape_string($coneccion, $_POST['torque'] ?? '');

 
    $imagen = $_FILES['imagen']['name'] ?? null;
    if ($imagen) {
        $carpeta_imagenes = '../../../imagenes/';
        $imagen_path = $carpeta_imagenes . $imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_path);
    } else {
        $imagen = $imagen_actual;
    }

    // Actualizar en la base de datos
    $sql = "UPDATE motos SET 
                nombre = '$nombre', 
                marca = '$marca', 
                modelo = " . ($modelo ? $modelo : "NULL") . ", 
                precio = " . ($precio ? $precio : "NULL") . ", 
                imagen = '$imagen', 
                reseña = '$reseña',
                documentos = '$documentos',
                km = " . ($km ? $km : "NULL") . ", 
                encendido = '$encendido', 
                colores = '$colores', 
                motor = '$motor', 
                cilindraje = '$cilindraje', 
                potencia = '$potencia', 
                torque = '$torque'
            WHERE id = $id";

    $resultado = mysqli_query($coneccion, $sql);

    if ($resultado) {
        header('Location: ../main.php');
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($coneccion);
    }
}

ob_end_flush();
?>
