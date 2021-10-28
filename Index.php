<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Pedido Digital - Início</title>
</head>

<body background-color="#fffff4">
  <?php

  include "navbar.php";

  if ($_SESSION["adm"] != "ativar" && $_SESSION["adm"] != "desativar") {
    session_start();
    $_SESSION["adm"] = "desativar";
  }

  ?>
  <center>
    <div class="container-fluid">
      <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="imagens/Logo.png" class="d-block w-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="imagens/BotaoRestaurante.png" class="d-block w-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="imagens/BotaoCliente.png" class="d-block w-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <a href="listaproduto.php?tipo=1"><img src="imagens/dinner_dining_black_24dp.svg" height="48dp"></a>
        </div>
        <div class="col">
          <a href="listaproduto.php?tipo=2"><img src="imagens/lunch_dining_black_24dp.svg" height="48dp"></a>
        </div>
        <div class="col">
          <a href="listaproduto.php?tipo=3"><img src="imagens/local_bar_black_24dp.svg" height="48dp"></a>
        </div>
        <div class="col">
          <a href="listaproduto.php?tipo=4"><img src="imagens/icecream_black_24dp.svg" height="48dp"></a>
        </div>
      </div>
    </div>
  </center>

</body>

</html>