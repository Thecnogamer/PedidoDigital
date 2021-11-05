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

  <br>
  <div class="container-md">
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

    <br>

    <div class="container-md">
      <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

          <?php
          
          include_once "conn.php";

          $pastaarquivos = "imagens/produtos/";
          
          $sql = "select nome, descricao, preco, foto from produto where promo <> 0";
          
          $resul = mysqli_query($conn,$sql);

          $i = 1;

          while ($dados = mysqli_fetch_assoc($resul)) {

            $nome = $dados["nome"];
            $descricao = $dados["descricao"];
            $foto = $dados["foto"];
            $preco = $dados["preco"];

            if ($i = 1) {
              echo "<div class='carousel-item active'>
                      <img src='$pastaarquivos$foto' class='d-block w-25' alt='$nome'>
                      <div class='carousel-caption d-none d-md-block'>
                        <h5>$nome</h5>
                        <p>$preco</p>
                        <p>$descricao</p>
                      </div>
                    </div>";
            }else {
              echo "<div class='carousel-item'>
                      <img src='$pastaarquivos$foto' class='d-block w-25' alt='$nome'>
                      <div class='carousel-caption d-none d-md-block'>
                        <h5>$nome</h5>
                        <p>$preco</p>
                        <p>$descricao</p>
                      </div>
                    </div>";
            }

            
            $i++;
          }
          
          
          
          ?>

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

    
  </center>

</body>

</html>