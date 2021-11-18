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
          } else {
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
        <?php if ($_SESSION["adm"] == "ativar") {
        ?> <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalConta">Conta</button> <?php
                                                                                                              } ?>

        <form id="selectRest" action="" method="POST">
          <?php

          if ($_SESSION["adm"] == "ativar") {
          } else {

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
            } else {
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

  <?php
  include_once "conn.php";
  if (isset($_SESSION["rest"])) {
    $form_id = $_SESSION["rest"];
    $modal_result = mysqli_query($conn,"select * from restaurante where id = $form_id");
  
    $modal = mysqli_fetch_assoc($modal_result);
  
    $nav_nome = $modal["nome"];
    $nav_nome_rest = $modal["nome_restaurante"];
    $nav_senha = $modal["senha"];
  }
  

  ?>

  <div class="modal fade" id="ModalConta" tabindex="-1" aria-labelledby="ModalContaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalContaLabel"><?php echo "$nav_nome_rest"; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" enctype="multipart/form-data">
          <label for="formnome">Nome de Usuário</label>  
          <input class="form-control" id="formnome" name="nome" type="text" value="<?php echo "$nav_nome"; ?>" readonly>
            
            <br>

            <label for="formsenha">Senha</label>
            <input class="form-control" id="formsenha" name="senha" type="password" value="<?php echo "$nav_senha"; ?>" readonly>
            
            <br>

            <label for="formsenhaconf" id="senhaconflabel" hidden>Confirmar Senha</label>
            <input class="form-control" id="formsenhaconf" name="senha_conf" type="password" hidden>
            <p id="senha_nomatch" style="color:#ff2727;" hidden> As senhas não correspondem</p>
            
            <br id="brlabel" hidden>

            <label for="formnomerest">Nome do Restaurante</label>
            <input class="form-control" id="formnomerest" name="nome_restaurante" type="text" value="<?php echo "$nav_nome_rest"; ?>" readonly>
            
            <br>


        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
          <button class="btn btn-danger" type="button" name="deletarconfirm" id="deletarconfirm" onclick="certeza()" >Deletar Conta?</button>
          <label for="deletar" id="labeldelete" hidden>Certeza?</label>
          <input class="btn btn-danger" type="submit" name="deletar" id="deletar" value="Deletar Conta!!!" hidden>
          <button class="btn btn-success" type="button" id="edit" onclick="editarconta()">Editar conta</button>
          <input class="btn btn-success" type="submit" name="salvar" id="save" value="Salvar mudanças" hidden>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php


  if (isset($_POST["salvar"]) && $_POST["senha"] == $_POST["senha_conf"]) {

    $form_nome = $_POST["nome"];
    $form_senha = $_POST["senha"];
    $form_senha_conf = $_POST["senha_conf"];
    $form_nome_rest = $_POST["nome_restaurante"];

    ?> <script type='text/javascript'>

    var par1 = document.getElementById('senha_nomatch');
    
    
    $(document).ready(function(){
        par1.hidden = true;
    });

        
</script><?php

    $sql_conta = "UPDATE `restaurante` SET `nome`='$form_nome',`senha`='$form_senha',`nome_restaurante`='$form_nome_rest' WHERE id = $form_id";

    $save_result = mysqli_query($conn, $sql_conta);

    if($save_result == true){
      ?><div class="alert alert-success" role="alert">
      Conta alterada com sucesso! Recarregando...
    </div>
    <script> setTimeout(function(){ document.location.assign('index.php'); }); </script>
    <?php
    }else {
      ?><div class="alert alert-danger" role="alert">
      Erro na alteração da conta...
    </div><?php
    }
  }elseif(isset($_POST["salvar"])){
    ?> <script type='text/javascript'>

    var par1 = document.getElementById('senha_nomatch');
    
    
    $(document).ready(function(){
        par1.hidden = false;
    });

        
</script><?php
  }
  if (isset($_POST["deletar"])) {
    $sql_conta = " DELETE FROM `restaurante` WHERE id='$form_id' ";

    $del_result = mysqli_query($conn,$sql_conta);

    if($del_result == true){
      ?><div class="alert alert-success" role="alert">
      Conta excluida com sucesso! Recarregando...
    </div>
    <script> setTimeout(function(){ document.location.assign('index.php'); }); </script>
    <?php session_destroy();
    }else {
      ?><div class="alert alert-danger" role="alert">
      Erro na exclusão da conta...
    </div><?php
    }
  }

  
  
  ?>


  <script>

    function editarconta() {
      var formnome = document.getElementById("formnome");
      var formsenha = document.getElementById("formsenha");
      var formsenhaconf = document.getElementById("formsenhaconf");
      var formnomerest = document.getElementById("formnomerest");
      var label = document.getElementById("senhaconflabel");
      var br = document.getElementById("brlabel");
      var btn = document.getElementById("save");
      var btne = document.getElementById("edit");

      formnome.readOnly = false;
      formsenha.readOnly = false;
      formsenhaconf.hidden = false;
      formnomerest.readOnly = false;
      label.hidden = false;
      br.hidden = false;
      btn.hidden = false;
      btne.hidden = true;

    }

    function certeza(){
      var btn1 = document.getElementById("deletarconfirm");
      var btn2 = document.getElementById("deletar");
      var label = document.getElementById("labeldelete");

      btn1.hidden = true;
      btn2.hidden = false;
      label.hidden = false;
    }

    function setarRestaurante(option) {
      let restaurante = option;
      let form = document.getElementById("selectRest");
      form.action = "validar.php?id=" + restaurante;
      form.submit();
    }
  </script>
</body>

</html>