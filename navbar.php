<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="CSS/Style.css" rel="stylesheet" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="CSS/fontawesome.css" rel="stylesheet" type="text/css">
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d7eeff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="imagens/logomin.png" alt="logo" width="25" height="25" class="d-inline-block align-text-top">
        Pedido Digital
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Produtos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="listaproduto.php">Tudo</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="listaproduto.php?tipo=1">Pratos Feitos</a></li>
              <li><a class="dropdown-item" href="listaproduto.php?tipo=2">Porções</a></li>
              <li><a class="dropdown-item" href="listaproduto.php?tipo=3">Bebidas</a></li>
              <li><a class="dropdown-item" href="listaproduto.php?tipo=4">Sobremesas</a></li>
            </ul>
          </li>

          <?php
          session_start();
          if (isset($_SESSION["adm"])) {

          }else {
            $_SESSION["adm"] = "desativar";
          }

          if ($_SESSION["adm"] == "ativar") {
            echo "<li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                        Modo ADM
                      </a>
                      <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='listaprodutoadm.php'>Lista ADM</a>
                        <a class='dropdown-item' href='frminserirproduto.php'>Inserir Produto</a>
                      </div>
                    </li>";
          }
          ?>
        </ul>

        <form id="selectRest" action="" method="POST">
          <?php

          if ($_SESSION["adm"] == "ativar") {
            
          }else {

            if (isset($_SESSION["rest"])) {

              ?>

              <div class="row-6">
                <select class="form-select" aria-label="Selecionar Restaurante" name="selectrestaurante" onchange="setarRestaurante(this.selectedIndex)">
                  <option onchange="setarRestaurante(this)" value='0'>--Escolha um restaurante--</option>
                  <?php

                  include_once "conn.php";

                  $nav_resul = mysqli_query($conn, "select * from restaurante");

                  while ($nav_dados = mysqli_fetch_assoc($nav_resul)) {

                    $nav_id = $nav_dados["id"];
                    $nav_nome_restaurante = $nav_dados["nome_restaurante"];

                    if ($nav_id == $_SESSION["rest"]) {
                      echo "<option selected onchange='setarRestaurante(this)' value='$nav_id'>$nav_nome_restaurante</option>";
                    } else {
                      echo "<option onchange='setarRestaurante(this)' value='$nav_id'>$nav_nome_restaurante</option>";
                    }
                  }
                  ?>
                </select>
              </div>

              <?php
            } 
            else {
                ?>
              <div class="row-6">
                <select class="form-select" aria-label="Selecionar Restaurante" name="selectrestaurante" onchange="setarRestaurante(this.selectedIndex)">
                  <option selected onchange="setarRestaurante(this)">--Escolha um restaurante--</option>

                  <?php

                    include_once "conn.php";

                    $nav_resul = mysqli_query($conn, "select * from restaurante");

                    while ($nav_dados = mysqli_fetch_assoc($nav_resul)) {

                      $nav_id = $nav_dados["id"];
                      $nav_nome_restaurante = $nav_dados["nome_restaurante"];

                      echo "<option onchange='setarRestaurante(this)'value='$nav_id'>$nav_nome_restaurante</option>";
                    }
                  ?>
                </select>
              </div>
              <?php
            }            
          }
          ?>
        </form>
          <?php 
          if($_SESSION["adm"] == "ativar"){
            echo "<a class='btn btn-danger' href='senhaadmsair.php' role='button'>Sair do modo Adm</a>";
          }else{
            echo "<a class='btn btn-success' href='senhaadmentrar.php' role='button'>Entrar no modo Adm</a>";
          }
          ?>
      </div>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>


  <script>
    function setarRestaurante(option) {
      let restaurante = option;
      let form = document.getElementById("selectRest");
      form.action = "validar.php?id=" + restaurante;
      form.submit();
    }
  </script>
</body>

</html>