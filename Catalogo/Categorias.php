<?php

  require '../config/configbs.php';
  require '../config/dbkarma3d.php';
  $db = new Database();
  $con = $db ->conectar();

  $sql = $con->prepare("SELECT id, nombre, descripcion, id_Categoria FROM categorias WHERE activo=1");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

  //session_destroy();

  //Print_r($_SESSION);

  
  ?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="../Style/css/bootstrap.min.css" rel="stylesheet">
        <link href="../barrasup.css" rel="stylesheet">
        <link rel="shortcut icon" href="../Images/KARMA3D.jpg" type="ico"/>
        <title>Karma3d</title>
        <link href="../Style/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Style/css/styles.css" rel="stylesheet">
        <link href="../Style/css/cargayscroll.css" rel="stylesheet">

  </head>
  
  <body class="text-center">

    <div class="loader-section" >
      <span class="loader"></span>
    </div>

    <div id="particles-js"></div>
        <style>
            .cajaimagen{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                perspective: 100px;
            }
            #logo {
                width: 15%;
                height: 15%;
                position: relative;
                top: -10px;
                filter: drop-shadow(0px 5px 10px #ffffffc7);
                animation: rotar 7s linear infinite;
            }
            @keyframes rotar{
                from{
                    transform: rotateY(0deg);
                }
                to{
                    transform: rotateY(-360deg);
                }
            }
        </style>
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <div class="cajaimagen">
                <section>
                    <img src="../Images/Karma3d2.png" id="logo">
                </section>
            </div>
        <div>
          <header class="mb-auto">
              <nav class="nav nav-masthead justify-content-center float-md-center">
                <a class="nav-link fw-bold py-2 px-0" aria-current="page" href="../index2.html">Home</a>
                <a class="nav-link fw-bold py-2 px-0 active" href="#Categorias">Categorias</a>
                <a class="nav-link fw-bold py-2 px-0" href="">Info</a>
                <a class="nav-link fw-bold py-2 px-0" href="#finpage">Contact</a>
              </nav>
          </header>
        </div>
    </div>

        <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-4">
            <?php foreach($resultado as $row) { ?>
                <div class="col">
                  <div class="card shadow-sm" style="background-color:gray; width:100% ;height: 380px; ">
                      <?php

                      $nombre = $row[('nombre')];
                      $imagen = "../Images/CHALLENGE Y RUSTY TRIAL/".  $nombre . "/Principal.jpg" ;

                      if(!file_exists($imagen)) {
                      $imagen = "../Images/KARMA3D.jpg";
                      }
                      ?>
                      <img src="<?php echo $imagen; ?>" alt="Avatar" class="card_image">
                      <div class="card-body" style="opacity: 1">
                      <h4 class="card-tittle"><?php echo $row['nombre']; ?></h4>
                      <p class="card-text"><?php echo $row['descripcion']; ?></p>
                      <div class="d-block justify-content-between align-items-center">
                          <div class="card_body">
                              <a href="../productos.php?id_Categoria=<?php echo $row[('id_Categoria')];?>&token=<?php echo hash_hmac('sha512', $row['id_Categoria'], KEY_TOKEN);?>" class="btn btn-lg btn-dark fw-medium border-dark bg-dark">Ir Ahora</a>
                          </div>
                      </div>
                      </div>
                  </div>
                </div>
            <?php } ?>
            </div>
        </div>
        
      </main>
          
      <footer class="container py-5" id="finpage">
        <div class="row">
            <div class="col-12 col-md">
            <br>
            <center><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg></center>
            <br>
            <small class="d-block mb-3 text-secondary ">&copy; 2018-2023 - Karma3d</small>
            </div>
        </div>
      </footer>
    </div>

    <script src="../Style/js/bootstrap.bundle.min.js"></script>

    <script src="../Style/js/particles.min.js"></script>

    <script src="../Style/js/app.js"></script>

    <script src="../Style/js/lib/stats.js"></script>

    <script src="../Style/js/carga.js"></script>

  </body>
</html>
