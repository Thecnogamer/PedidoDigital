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


  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #fffde4;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="imagens/logomin.png" alt="logo" width="30" height="30" class="d-inline-block align-text-top">
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
              <li><a class="dropdown-item" href="#">Pratos Feitos</a></li>
              <li><a class="dropdown-item" href="#">Porções</a></li>
              <li><a class="dropdown-item" href="#">Bebidas</a></li>
              <li><a class="dropdown-item" href="#">Sobremesas</a></li>
            </ul>
          </li>
          <?php
          session_start();
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
        <?php
        if ($_SESSION["adm"] == "ativar") {
          echo "<a class='btn btn-danger' href='senhaadmsair.php' role='button'>Sair do modo Adm</a>";
        } else {
          echo "<a class='btn btn-success' href='senhaadmentrar.php' role='button'>Entrar no modo Adm</a>";
        }
        ?>
      </div>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>

</html>