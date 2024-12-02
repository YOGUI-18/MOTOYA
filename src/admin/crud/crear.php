<?php include '../head.php';
$crud=true;
try {
    require '../../../conexiones/coneccion_bd.php';

    $sql = "SELECT * FROM marcas";

    $consulta = mysqli_query($coneccion, $sql);
} catch (\Throwable $th) {
    echo $th;
}

$alerta = [];

$nombre = '';
$marcaId = '';
$modelo = '';
$precio = '';
$imagen = '';
$reseña = '';
$documentos = '';
$km = '';
$encendido = '';
$color = '';
$motor = '';
$cilindraje = '';
$potencia = '';
$torque = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $nombre = mysqli_real_escape_string($coneccion, $_POST['nombre']);
    $marcaId = mysqli_real_escape_string($coneccion, $_POST['marca']);
    $modelo = intval(mysqli_real_escape_string($coneccion, $_POST['modelo']));
    $precio = floatval(mysqli_real_escape_string($coneccion, $_POST['precio']));
    $reseña = mysqli_real_escape_string($coneccion, $_POST['reseña']);
    $documentos = mysqli_real_escape_string($coneccion, $_POST['documentos']);
    $km = mysqli_real_escape_string($coneccion, $_POST['km']);
    $encendido = mysqli_real_escape_string($coneccion, $_POST['encendido']);
    $color = mysqli_real_escape_string($coneccion, $_POST['color']);
    $motor = mysqli_real_escape_string($coneccion, $_POST['motor']);
    $cilindraje = mysqli_real_escape_string($coneccion, $_POST['cilindraje']);
    $potencia = mysqli_real_escape_string($coneccion, $_POST['potencia']);
    $torque = mysqli_real_escape_string($coneccion, $_POST['torque']);


    $imagen = $_FILES['imagen'];


    if (!$nombre) {
        $alerta[] = "falta añadir un nombre a la moto";
    }
    if (!$marcaId) {
        $alerta[] = "Debes seleccionar una marca";
    }

    if (!$modelo) {
        $alerta[] = 'El modelo es Obligatorio';
    }
    if (!$precio) {
        $alerta[] = 'El Precio es Obligatorio';
    }

    if (strlen($reseña) < 50) {
        $alerta[] = 'La descripción es obligatoria y debe tener minimo 50 caracteres y maximo 255';
    }

    if (!$documentos) {
        $alerta[] = 'seleccione el estado de los documentos';
    }

    if (!$km) {
        $alerta[] = 'El kilometraje es obligatorio';
    }

    if (!$encendido) {
        $alerta[] = 'falta seleccionar el tipo de encendido';
    }

    if (!$color) {
        $alerta[] = 'el color de la moto es obligatorio';
    }
    if (!$motor) {
        $alerta[] = 'el motor es obligatorio';
    }
    if (!$cilindraje) {
        $alerta[] = 'El cilindraje es Obligatorio';
    }
    if (!$potencia) {
        $alerta[] = 'la potencia es Obligatorio';
    }
    if (!$torque) {
        $alerta[] = 'El torque es Obligatorio';
    }

    if (!$imagen['name'] || $imagen['error']) {
        $alerta[] = 'La Imagen es Obligatoria';
    }

    $medida = 1000 * 1000;


    if ($imagen['size'] > $medida) {
        $errores[] = 'La Imagen debe ser menor a ' . $medida . ' kb';
    }


    if (empty($alerta)) {
        try {

            $carpetaImagenes = '../../../imagenes/';

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = md5(uniqid(rand(), true)) . ".webp";



            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


            $sql = " INSERT INTO motos (nombre, marca, modelo, precio, imagen, reseña, documentos, km, encendido, colores, motor, cilindraje, potencia, torque ) VALUES ( '$nombre', '$marcaId',$modelo, $precio, '$nombreImagen', '$reseña', '$documentos', '$km', '$encendido', '$color', '$motor', '$cilindraje','$potencia','$torque' );";

            $consulta = mysqli_query($coneccion, $sql);
           
            if ($consulta) {

                header('Location: ../main.php');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}

?>

<div class="container w-[90%] lg:w-4/6 mx-auto">

    <?php foreach ($alerta as $error): ?>
        <div class="bg-red-600 text-white text-center">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="my-10 capitalize border-2 border-gray-600 bg-white py-5 px-10 border-solid" method="POST" action="./crear.php" enctype="multipart/form-data">
        <fieldset class="flex flex-col ">
            <legend class="text-center md:text-xl uppercase italic text-stone-600 mb-10">Información General de la moto</legend>

            <label class="text-lg font-bold capitalize" for="nombre">nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="nombre de la moto" value="<?php echo $nombre; ?>" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2">

            <label class="text-lg font-bold capitalize mt-7">marca</label>
            <select name="marca" class="w-1/3 border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2">
                <option>-- Seleccione --</option>
                <?php while ($marca =  mysqli_fetch_assoc($consulta)) : ?>
                    <option <?php echo $marcaId === $marca['idmarcas'] ? 'selected' : ''; ?> value="<?php echo $marca['idmarcas']; ?>"> <?php echo $marca['nombre']; ?> </option>
                <?php endwhile; ?>

            </select>

            <label for="modelo" class="text-lg font-bold capitalize mt-7">modelo</label>
            <input type="number" id="modelo" name="modelo" min="2000" max="2025" step="1" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2 w-1/2">

            <label class="text-lg font-bold capitalize mt-7" for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="valor de la moto" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2 w-1/2" value="<?php echo $precio; ?>">

            <label class="text-lg font-bold capitalize mt-7 mb-3" for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/webp, " name="imagen" value="<?php $imagen ?>">

            <label class="text-lg font-bold capitalize mt-7" for="reseña">reseña</label>
            <textarea id="reseña" name="reseña" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" value="<?php echo $reseña; ?>"></textarea>

        </fieldset>
        <hr class="border-2 border-gray-600 my-5 ">
        <fieldset class="flex flex-col md:flex-row w-full md:gap-16">
            <legend class="text-center md:text-xl uppercase italic text-stone-600 mb-10">Información especifica de la moto</legend>

            <div class="flex flex-col  w-full ">
                <label class=" font-bold capitalize mt-7" for="potencia">Documentos</label>
                <select name="documentos" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2">
                    <option value="">-- Seleccione --</option>
                    <option value="vencidos">--vencidos--</option>
                    <option value="al_dia">--al dia--</option>


                </select>

                <label class=" font-bold capitalize mt-7" for="km">kilometraje</label>
                <input type="number" id="km" name="km" placeholder="kilometraje" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" min=0 value="<?php echo $km; ?>">

                <label class=" font-bold capitalize mt-7" for="encendido">Encendido</label>
                <select name="encendido" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2">
                    <option value="">-- Seleccione --</option>
                    <option value="electrico">--Electrico--</option>
                    <option value="patada">--Patada--</option>
                    <option value="electrico-Patada">--Electrico-Patada--</option>
                </select>
                <label class=" font-bold capitalize mt-7" for="color">colores</label>
                <input type="text" id="color" name="color" placeholder="colores de la moto" class="border-b-2 border-solid border-gray-100 placeholder:text-gray-300 italic mt-1 p-2" value="<?php echo $color; ?>">
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
        <hr class="border-2 border-gray-600 my-5">
        <div class="my-10 flex justify-end gap-3">
            <a href="../main.php" class="bg-red-600 py-2 px-5 text-white uppercase font-bold rounded-lg">Cancelar</a>
            <input type="submit" value="Guardar" class="bg-blue-700 py-2 px-5 text-white uppercase font-bold rounded-lg">
        </div>

    </form>
</div>

<?php
include '../footer.php';