<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>Pedido Digital - Início</title>
    <link href="CSS/Style.css" rel="stylesheet" type="text/css">
    <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
   </head>
<body background-color="#fffff4">
   <?php
   
   include_once "navbar.php";
   
   ?>
    <center>
    <div id="carouselProdutos" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselProdutos" data-slide-to="0" class="active"></li>
        <li data-target="#carouselProdutos" data-slide-to="1"></li>
        <li data-target="#carouselProdutos" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-25" src="imagens/BotaoCliente.png" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>...</h5>
            <p>...</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-25" src="imagens/BotaoRestaurante.png" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>...</h5>
            <p>...</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-25" src="imagens/Faixa.png" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>...</h5>
            <p>...</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselProdutos" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselProdutos" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
   </center>
   <center><img src="imagens/BotaoCliente.png" width="500" height="500"></center>
   <center><img src="imagens/BotaoRestaurante.png" width="500" height="500"></center>
</body>
</html>
