<?php 

require "./includes/body.php";
?>

    <main class="bg-gray-50 py-12">
        <h1 class="text-center text-4xl font-semibold text-gray-800 mb-10">Contactanos</h1>
        <div class="container mx-auto px-6 lg:px-8 max-w-3xl">
            <form method="POST" class="bg-gradient-to-t from-orange-400 to-red-500 p-8 rounded-lg shadow-xl border border-gray-200">

                <fieldset>
                    <legend class="text-center text-2xl font-semibold text-gray-700 uppercase mb-8">Formulario de contacto</legend>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="Nombre" class="block text-lg font-medium text-gray-700">Nombre</label>
                                <input name="nombre" type="text" id="Nombre" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:outline-none" placeholder="Su Nombre Completo" required autofocus>
                            </div>
                            <div>
                                <label for="Telefono" class="block text-lg font-medium text-gray-700">Telefono</label>
                                <input name="telefono" type="number" id="Telefono" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:outline-none" placeholder="+57 3*********" required>
                            </div>
                        </div>
    
                        <div>
                            <label for="Email" class="block text-lg font-medium text-gray-700">Email</label>
                            <input name="email" type="email" id="Email" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:outline-none" placeholder="correo@correo.com" required>
                        </div>
    
                        <div>
                            <label for="Mensaje" class="block text-lg font-medium text-gray-700">Mensaje</label>
                            <textarea name="mensaje" id="Mensaje" class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:outline-none h-32" placeholder="Escribe tu mensaje aquí..." required></textarea>
                        </div>
    
                        <div class="text-center">
                            <button type="submit" class="bg-cyan-400 text-white font-semibold py-3 px-8 rounded-full shadow-md hover:bg-orange-500 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-orange-400">
                                Enviar Mensaje
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </main>

    <?php 
    require "../conexion.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];
        $sql = "INSERT INTO contacto (nombre,telefono,email,mensaje)
        VALUES ('$nombre', '$telefono', '$email', '$mensaje')";
        $mysql = mysqli_query($conexion, $sql);
        if ($mysql) {
            echo  "<script>alert('Mensaje Enviado exitosamente.'); window.location.href = 'contacto.php';</script>";
    }else {
        echo "Error:" .mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
    ?>


<div class="flex mt-20 gap-8 px-10">
    <div id="map" class="h-[400px] w-1/2 mx-auto"></div>

<div class="bg-orange-100 py-3 w-1/2 text-xl rounded-md font-bold flex flex-col items-center justify-center">
    <h3 class="text-center font-bold uppercase mb-5 ">llegar a nosotros</h3>
    <div class="flex items-center gap-3 p-3">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
      </svg>
    
      <div>
        <p>cll 8 cra 14-07</p>
        <p>Saravena-Arauca</p>
      </div>
   
    </div>
    <div class="flex items-center gap-3 p-3">
        <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
          </svg>
      
      <div>
        <p>+57 3213234750</p>
      </div>
    </div>
      <div class="flex items-center gap-3 p-3">
        <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
            <path d="M16 20h3a1 1 0 0 0 1 -1v-14a1 1 0 0 0 -1 -1h-3v16z"></path>
            <path d="M5 20h3v-16h-3a1 1 0 0 0 -1 1v14a1 1 0 0 0 1 1z"></path>
            <path d="M16 4l-4 4l-4 -4"></path>
            <path d="M4 6.5l8 7.5l8 -7.5"></path>
          </svg>
          <div>
            <p>MotoYaSaravena@gmail.com</p>
          </div>

</div>

</div>
</div>

<div class="bg-green-600 p-3  rounded-full fixed bottom-48 right-2  ">
    <a href="https://api.whatsapp.com/send?phone=573143576133&amp:text= Desde Sitio Web Edinson Ojeda" class="text-white bg-green-600 p-3  rounded-full fixed bottom-48 right-2  ">

    <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="50" height="50" stroke-width="2">
        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
        <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
      </svg>
</a>
</div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
   
    <script>
       
        var map = L.map('map').setView([6.945277, -71.871493], 14);  
        


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([6.950569, -71.872252]).addTo(map)
            .bindPopup('saravena')
            .openPopup();
    </script>
    
    <?php 
    require "./includes/footer.php";
    ?>
    