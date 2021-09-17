<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-light" style="background-color: #fffde4;">
      <a class="navbar-brand" href="index.php">
         <img src="imagens/Logomin.png" width="30" height="30" class="d-inline-block align-top" alt="">
         Pedido Digital
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Index.php">Início</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produtos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Pratos feitos</a>
              <a class="dropdown-item" href="#">Porções</a>
              <a class="dropdown-item" href="#">Bebidas</a>
              <a class="dropdown-item" href="#">Sobremesas</a>
            </div>
          </li>
          <?php
          session_start();
            if ($_SESSION["adm"] == "ativar") {
              echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              Modo ADM
              </a>
              <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item' href='frminserirproduto.php'>Inserir Produto</a>
                <a class='dropdown-item' href='listaprodutoadm.php'>Listar Produtos</a>
              </div>
            </li>"; 
            }
          ?>
        </ul>
        <?php
        if ($_SESSION["adm"] == "ativar") {
          echo"<a class='btn btn-danger' href='senhaadmsair.php' role='button'>Sair do modo Adm</a>";
        }
        else {
          echo"<a class='btn btn-success' href='senhaadmentrar.php' role='button'>Modo Adm</a>";
        }
        ?>
      </div>
    </nav>
</body>