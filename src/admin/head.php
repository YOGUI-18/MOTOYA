<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/src/output.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <nav class="flex justify-between bg-blue-600 p-10 text-white trext-lg">
    <div>
      <img src="" alt="logo motoya">
    </div>
    <div>
      <?php

    session_start();
       if (isset($_SESSION['login']) && ($_SESSION['login']===true)) {
       ?>
        <p>Usuario <?php
              echo $_SESSION['nombre']; ?></p>
      <?php
      }
      ?>
     
    </div>
    <div>
      <?php
    if (isset($_SESSION['login']) && ($_SESSION['login']===true)) {
       if (isset($crud)) {
        echo '<a href="../logout.php">Cerrar cesion</a>';  
      } else 
        echo '<a href="./logout.php">Cerrar cesion</a>';
      
      }
      ?>

    </div>

  </nav>
</body>

</html>