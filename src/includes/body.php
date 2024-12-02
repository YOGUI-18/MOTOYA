<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>anuncios</title>
    
    <link rel="stylesheet" href="output.css">
    <?php echo $contacto ?? ' <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />'; ?>

</head>
<body class="bg-gray-200">
<?php 
    // Verifica si $index es falso y muestra el bloque correspondiente

echo isset($index) == false ? 
    '<div class="flex justify-between text-center gap-10 bg-gray-800">
        <a href="../src/index.php" class="w-1/12 p-2">
            <img src="../img/logo.png" alt="Logotipo de MotosYa" class="w-full">
            <p class="text-white uppercase text-xs -mt-6">motoya-saravena</p>
        </a>
        <nav id="menu" class="hidden flex flex-col md:flex md:flex-row justify-around capitalize mt-5 text-2xl w-3/4 text-white">
            <a href="../src/nosotros.php" class="hover:text-3xl font-bold">Nosotros</a>
            <a href="../src/anuncios.php" class="hover:text-3xl font-bold">Anuncios</a>
            <a href="../src/blog.php" class="hover:text-3xl font-bold">Blog</a>
            <a href="../src/contacto.php" class="hover:text-3xl font-bold">Contacto</a>
        </nav>
        <button class="md:hidden text-blue-600" id="btnMenu">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                <path d="M7 8h10"></path>
                <path d="M7 12h10"></path>
                <path d="M7 16h10"></path>
            </svg>
        </button>
    </div>' : 
    '<header class="bg-[url(\'../img/hero.jpg\')] bg-cover bg-center h-[600px] relative flex flex-col">
        <div class="bg-black bg-opacity-65 w-full h-full absolute">
            <div class="flex justify-between text-center gap-10">
                <a href="index.php" class="w-1/4">
                    <img src="../img/logo.png" alt="Logotipo de MotosYa" class="w-full">
                    <p class="text-white uppercase text-2xl -mt-12">motoya-saravena</p>
                </a>
                <nav id="menu" class="hidden flex-col md:flex md:flex-row justify-around capitalize mt-28 text-2xl w-3/4 text-white">
                    <a href="../src/nosotros.php" class="hover:text-3xl font-bold">Nosotros</a>
                    <a href="../src/anuncios.php" class="hover:text-3xl font-bold">Anuncios</a>
                    <a href="../src/blog.php" class="hover:text-3xl font-bold">Blog</a>
                    <a href="../src/contacto.php" class="hover:text-3xl font-bold">Contacto</a>
                </nav>
                <button class="md:hidden text-blue-600" id="btnMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                        <path d="M7 8h10"></path>
                        <path d="M7 12h10"></path>
                        <path d="M7 16h10"></path>
                    </svg>
                </button>
            </div>
            <div class="mt-32">
                <h1 class="text-5xl uppercase text-white text-center">Compra y venta de motos</h1>
            </div>
        </div>
    </header>';
?>

