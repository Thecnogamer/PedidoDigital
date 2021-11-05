<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pedido Digital - Cadastro</title>
    </head>
    <body>
    <?php include "navbar.php"?>
    <br>
    <div class="container">
        
            
            <form class="row gy-2 gx-3 align-items-center" name="frmnome" action="" method="POST">
                <div class="col-auto">
            <h2> Cadastro restaurante</h2>
                <label class="form-label" for="nome">Nome de usuário</label>
                <input class="form-control" type="text" name="nome" required="required">
                <br>

                <label class="form-label" for="senha">Senha</label>
                <input class="form-control" type="password" name="senha" required="required">
                <br>

                <label class="form-label" for="restaurante">Restaurante</label>
                <input class="form-control" type="text" name="restaurante" required="required">
                <br>

                <input class ="btn btn-success" type="submit" name="cadastrar" value="Cadastrar">
                <a class="btn btn-secondary" href="senhaadmentrar.php">Logar</a>
                </div>
            </form>
        </div>
        <br>
        <?php
            if (isset($_POST["cadastrar"])) {
        
            $n = $_POST["nome"];
            $s = $_POST["senha"];
            $r = $_POST["restaurante"];

            include_once("conexao.php");

            $sql = "insert into tb_nome (nome,senha,restaurante)
            values ('$n','$s','$r')";

            $result = mysqli_query($conn, $sql);

            if($result == true){
                echo "<script type='text/javascript'>
              $(document).ready(function(){
              $('#ModalYes').modal('show');
              });
              </script>";
            }
            else{
                echo "<script type='text/javascript'>
              $(document).ready(function(){
              $('#Modaleita').modal('show');
              });
              </script>";
            }
            
        }
            
            
            
            
        
        
        ?>
        <div class='modal fade' id='ModalYes' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                        Cadastro realizado com sucesso
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' data-bs-dismiss='modal' href="senhaadmentrar.php">Logar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class='modal fade' id='Modaleita' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                        Algo deu errado
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tentar novamente</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>