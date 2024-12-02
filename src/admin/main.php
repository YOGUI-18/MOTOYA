<?php
include './head.php';
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('Location: login.php');
    exit();
    }

try {
    require '../../conexiones/coneccion_bd.php';

    

    $sql = "SELECT mo.id, CONCAT(mo.nombre,' ', ma.nombre,' ',mo.modelo)as moto, mo.precio, mo.documentos, mo.km, mo.encendido, mo.colores, mo.cilindraje FROM motos mo INNER JOIN marcas ma ON mo.marca = ma.idmarcas;";

    $consulta = mysqli_query($coneccion, $sql);
} catch (\Throwable $th) {
    echo $th;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        try {
            $sql = "SELECT imagen FROM motos WHERE id = $id";

            $consulta = mysqli_query($coneccion, $sql);
            $moto = mysqli_fetch_assoc($consulta);

            unlink('../../imagenes/' . $moto['imagen']);


            $sql = "DELETE FROM motos WHERE id = $id";
            $consulta = mysqli_query($coneccion, $sql);

            if ($consulta) {
                header('location: ./main.php');
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}



?>

<div class="container lg:w-5/6 w-[95%] mx-auto mt-10 overflow-x-auto">
    <div class="justify-center flex md:justify-end ">
        <div class="bg-blue-800 mb-10 flex flex-col items-center text-white p-2 rounded-lg hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="32" height="32" stroke-width="2">
                <path d="M19 10h-14"></path>
                <path d="M5 6h14"></path>
                <path d="M14 14h-9"></path>
                <path d="M5 18h6"></path>
                <path d="M18 15v6"></path>
                <path d="M15 18h6"></path>
            </svg>
            <button id="btnPublicar" class="capitalize font-bold rounded-xl inline-block -mt-2 text-sm">crear publicacion</button>

            <ul id="listaDesplegable" class="mt-2 space-y-2 bg-white border border-gray-300 rounded shadow-lg hidden">
                <li><a href="./crud/crear.php" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Anuncio</a></li>
                <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Entrada de blog</a></li>

            </ul>
            <script>
                
                const btnPublicar = document.querySelector('#btnPublicar');
                const lista = document.querySelector('#listaDesplegable');

                
                btnPublicar.addEventListener('click', () => {
                    
                    lista.classList.toggle('hidden');
                });
            </script>
        </div>

    </div>

    <table class="w-full mb-10 p-10 bg-white ">
        <thead class="capitalize text-lg ">
            <tr class="bg-stone-800 text-white ">
                <th class="py-3 rounded-ss-2xl">id</th>
                <th>moto</th>
                <th>precio</th>
                <th>documentos</th>
                <th>km</th>
                <th>Encendido</th>
                <th>color</th>
                <th>cilindraje</th>
                <th class="rounded-se-2xl">acciones</th>
            </tr>
        </thead>

        <tbody class=" capitalize ">

            <?php while ($motos = mysqli_fetch_assoc($consulta)) : ?>

                <tr class="border-b-2 border-stone-400 text-center">
                    <td> <?php echo $motos['id']; ?></td>
                    <td> <?php echo $motos['moto']; ?></td>
                    <td> <?php echo '$ ' . number_format($motos['precio'], 2, '.', ','); ?></td>
                    <td> <?php echo $motos['documentos']; ?></td>
                    <td> <?php echo $motos['km'] . ' km'; ?></td>
                    <td> <?php echo $motos['encendido']; ?></td>
                    <td> <?php echo $motos['colores']; ?></td>
                    <td> <?php echo $motos['cilindraje'] . ' cc'; ?></td>
                    <td>
                        <div class="flex flex-col gap-1 text-white mb-2 mt-2">
                            <a href="./crud/actualizar.php?id=<?php echo $motos['id']; ?>" class="bg-blue-600 p-2 rounded-lg">Actualizar</a>

                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $motos['id']; ?>">
                                <input type="submit" value="Eliminar" class="bg-red-600 p-2 rounded-lg w-full">

                            </form>
                        </div>
                    </td>
                </tr>

            <?php endwhile; ?>


        </tbody>
    </table>

</div>

<?php include '../includes/footer.php'; ?>

