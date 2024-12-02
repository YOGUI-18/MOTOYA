<?php 
require "./includes/body.php";
?>


    <div class="container md:w-5/6 mx-auto px-5 md:px-0 mb-16">
        <h1 class="text-center uppercase text-xl md:text-2xl py-4 font-bold">Blog de Motos <br> <span class="text-base md:text-xl font-semibold"> Guias, Reseñas y Tendencias del Sector
        </span>
    </h1>
    <article class="mt-10 border-b-4 pb-8 border-double border-gray-950">
        <div class="flex flex-col-reverse md:flex-row gap-5 md:h-64 lg:h-60">
            <header class="md:w-1/2 lg:w-1/3">
                <h2 class="capitalize font-bold text-xl">Cómo Elegir la Moto Perfecta: Guia para Compradores Principiantes</h2>
                <p class="md:leading-7 lg:leading-8 py-3">Elegir la moto adecuada puede ser un desafio, especialmente si eres principiantes. Descubre los factores clave que debes considerar para tomar la mejor decisió y encontrar la moto que se ajuste a tus necesidades.</p>
            </header>

            <figure class="md:w-1/2 lg:w-2/3 h-auto">
                <img src="../img/anuncio1.jpg" alt="Moto recomendada para ´principiantes" class="object-cover h-full w-full object-center rounded-lg"/>
                <figcaption class="text-xs md:text-base">Elige la moto que mejor se adapte a tu estilo de conduccion. 
                </figcaption>
            </figure>

        </div>
        <footer>
            <a href="/src/entrada.php" class="text-xl font-bold hover:px-3 hover:py-2 hover:bg-orange-600 rounded-xl">Leer más...</a>
        </footer>
    </article>

    <div class="md:grid grid-cols-2 gap-10">
        <article class="mt-16 flex flex-col justify-between border-b-4 pb-8 border-double border-gray-950">
            <header>
                <h2 class="font-bold">Las Mejores Motos de 2024: Reseñas y Recomendaciones para Cada Estilo</h2>
                <p class="excerpt">¿Estás buscando las mejores motos del año? En este artículo, exploramos las opciones más destacadas de 2024, ideales para diferentes estilos y necesidades de conduccion. ¡No te lo pierdas! </p>
            </header>
            <figure>
                <img src="../img/anuncio1.jpg" alt="Las mejores motos de 2024" class="w-full h-56 object-cover object-center rounded-md mt-2"/>
                <figcaption>Explora las motos más destacadas del 2024, según tu estilo de conducción.</figcaption>
            </figure>
            <footer>
                <a href="#" class="text-xl font-bold hover-px3 hover:py-2 hover:bg-orange-600 rounded-xl">Leer más...</a>
            </footer>
        </article>
        <div class="md:grid gap-10">
            <article class="mt-16 flex flex-col justify-between border-b-4 pb-8 border-double border-gray-950">
                <header>
                    <h2 class="font-bold">Mantenimiento Básico para Motos: Consejos para Prolongar la vida de tu Vehículo</h2>
                    <p class="excerpt">El mantenimiento regular es clave para mantener tu moto en óptimas condiciones. aquí te damos los mejores consejos para cuidar tu moto y garantizar su longevidad. </p>
                </header>
                <figure>
                    <img src="../img/anuncio1.jpg" alt="Las mejores motos de 2024" class="w-full h-56 object-cover object-center rounded-md mt-2"/>
                    <figcaption>Realiza un mantenimiento adecuado para extender la vida útil de tu moto.</figcaption>
                </figure>
                <footer>
                    <a href="#" class="text-xl font-bold hover-px3 hover:py-2 hover:bg-orange-600 rounded-xl">Leer más...</a>
                </footer>
            </article>
        </div>
    </div>


    <div class="md:grid grid-cols-2 gap-10">
        <article class="mt-16 flex flex-col justify-between border-b-4 pb-8 border-double border-gray-950">
            <header>
                <h2 class="font-bold">¿Moto nueva o usada? Pros y Contras de comprar en cada Opción</h2>
                <p class="excerpt">Decidir entre una moto nueva o usada puede ser complicado. Aquí te mostramos los pros y contras de ambas opciones para que tomes una decisión informada que se ajuste a tu presupuesto y necesidades  </p>
            </header>
            <figure>
                <img src="../img/anuncio1.jpg" alt="Las mejores motos de 2024" class="w-full h-56 object-cover object-center rounded-md mt-2"/>
                <figcaption>Compara las ventajas y desventajas de motos nuevas y usadas.</figcaption>
            </figure>
            <footer>
                <a href="#" class="text-xl font-bold hover-px3 hover:py-2 hover:bg-orange-600 rounded-xl">Leer más...</a>
            </footer>
        </article>
 <div class="md:grid gap-10">
            <article class="mt-16 flex flex-col justify-between border-b-4 pb-8 border-double border-gray-950">
                <header>
                    <h2 class="font-bold">La Evolución de las Motos Eléctricas: Futuro y Tendencias del Mercado</h2>
                    <p class="excerpt">Las motos eléctricas están ganando popularidad rápidamente. Descubre cómo han evolucionado, las últimas innovaciones y por qué podrían ser el futuro de la movilidad en dos ruedas.</p>
                </header>
                <figure>
                    <img src="../img/anuncio1.jpg" alt="Las mejores motos de 2024" class="w-full h-56 object-cover object-center rounded-md mt-2"/>
                    <figcaption>Explora cómo las motos eléctricas están revolucionando el mercado.</figcaption>
                </figure>
                <footer>
                    <a href="#" class="text-xl font-bold hover-px3 hover:py-2 hover:bg-orange-600 rounded-xl">Leer más...</a>
                </footer>
            </article>
        </div>
    </div>

    

    </div>
    <?php 
    require "./includes/footer.php";
    ?>