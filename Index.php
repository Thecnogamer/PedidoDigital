<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Pedido Digital - Início</title>
</head>

<body>
  <?php
 

  include_once "navbar.php";
  if(isset($_SESSION["rest"]) && $_SESSION["rest"] != "0"){

  

  if ($_SESSION["adm"] != "ativar" && $_SESSION["adm"] != "desativar") {
    session_start();
    $_SESSION["adm"] = "desativar";
  }

  include_once "conn.php";

          $r = $_SESSION["rest"];

          $pastaarquivos = "imagens/produtos/";
          
          $sql = "select nome, descricao, preco, foto from produto where promo <> 0 and id_restaurante = $r";
          
          $resul = mysqli_query($conn,$sql);

          $resul1 = mysqli_query($conn,$sql);

          $i = 1;

  ?>
  <center>

  <br>
  <div class="container-md">
      <div class="row">
        <div class="col">
          <a href="listaproduto.php?tipo=1" name="link1"><img src="imagens/spaguetti.png" height="48dp"></a><br>
          <label for="link1">Pratos Feitos</label>                   
        </div>
        <div class="col">
          <a href="listaproduto.php?tipo=2" name="link2"><img src="imagens/burger.png" height="48dp"></a><br>
          <label for="link2">Porções</label>
        </div>
        <div class="col">
          <a href="listaproduto.php?tipo=3" name="link3"><img src="imagens/cocktail.png" height="48dp"></a><br>
          <label for="link3">Bebidas</label>          
        </div>
        <div class="col">
          <a href="listaproduto.php?tipo=4" name="link4"><img src="imagens/birthday-cake.png" height="48dp"></a><br>
          <label for="link4">Sobremesas</label>
        </div>
      </div>
    </div>

    <br>

    <div class="container-md">
      <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php $ib= 0; while(mysqli_fetch_assoc($resul1)){ if($ib == 0){?>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <?php }else{ ?>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo"$ib";?>" aria-label="Slide <?php echo $ib+1; ?>"></button>
          <?php } $ib++; } ?>
        </div>
        <div class="carousel-inner">

          <?php

          while ($dados = mysqli_fetch_assoc($resul)) {

            $nome = $dados["nome"];
            $descricao = $dados["descricao"];
            $foto = $dados["foto"];
            $preco = $dados["preco"];

            if ($i == 1) {
              ?> <div class="carousel-item active">
                      <img src="<?php echo"$pastaarquivos$foto";?>" class="d-block" style="height: 20rem" alt="<?php echo"$nome";?>">
                      <div class="carousel-caption d-none d-sm-block" style="background: rgba(211, 221, 227, 0.4);" >
                        <h5><?php echo"$nome"; ?></h5>
                        <p>R$:<?php echo"$preco"; ?></p>
                        <p><?php echo"$descricao"; ?></p>
                      </div>
                    </div>
            <?php
            }else {
              ?> <div class="carousel-item">
                      <img src="<?php echo"$pastaarquivos$foto";?>" class="d-block" style="height: 20rem" alt="<?php echo"$nome";?>">
                      <div class="carousel-caption d-none d-sm-block" style="background: rgba(211, 221, 227, 0.4);" >
                        <h5><?php echo"$nome";?></h5>
                        <p>R$:<?php echo"$preco";?></p>
                        <p><?php echo"$descricao";?></p>
                      </div>
                    </div>
            <?php
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
  <?php } else{
    echo"<center> <font size=26> Por favor escolha um restaurante na barra acima</font> </center>";
  } ?>


</body>

</html>