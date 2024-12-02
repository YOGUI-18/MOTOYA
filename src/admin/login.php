<?php include './head.php'; ?>

    

<div class="bg-white p-8 rounded-lg shadow-2xl w-1/3 mx-auto mt-20 shadow-black">
    <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>

    <form action="login.php" method="POST">

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electronico</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="correo@correo.com" require>
        </div>

        <div class="mb-6">
            <label for="pass" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" id="pass" name="pass" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="********" require>
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">iniciar Sesion</button>
    </form>

    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">¿olvidaste tu contraseña <a href="#" class="text-blue-500 hover:underline">Click aqui</a></p>
    </div>
</div>
<?php 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    try {
        require '../../conexiones/coneccion_bd.php';

        $sql = "SELECT * FROM usuarios WHERE correo='$email' ";

        $consulta= mysqli_query($coneccion,$sql);

        $resul= mysqli_fetch_assoc($consulta);

        $usuario =$resul['correo'];
        $contra = $resul['contraseña'];
        $nombre = $resul['nombre'];
            

        
    } catch (\Throwable $th) {
        echo($th);
    }
    if (isset($usuario) && $contra === $password) {
        $_SESSION['login']=true;
        $_SESSION['nombre']=$nombre;
        header('location: ./main.php');
        exit();
    }else {
        
        $error = "Correo o contraseña inconrrectos.";
        ?>
        <div class="bg-red-100 text-red-600 p-4 mb-4 border-red-400 rounded w-1/3 mx-auto">
            <?php echo $error ?>
        </div>
        <?php
    }
}

