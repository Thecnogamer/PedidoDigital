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
                <input class="form-control" type="text" id="inputuser" name="nome" required="required">
                <p id="usuarioExistente" style="color:#ff2727;" hidden> Usuário ja cadastrado</p>
                <br id="bruser">

                <label class="form-label" for="senha">Senha</label>
                <input class="form-control" type="password" name="senha" required="required">
                <br>

                <label class="form-label" for="senha">Confirmar senha</label>
                <input class="form-control" type="password" name="senha_conf" required="required">
                <p id="senha_nomatch" style="color:#ff2727;" hidden> senhas não correspondem</p>
                <br id="brsenha">

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
            $sc = $_POST["senha_conf"];
            $r = $_POST["restaurante"];

            include_once "conn.php";

            $sqlUser = "select nome from restaurante where nome = '$n'";

            $queryresult = mysqli_query($conn,$sqlUser);

            if (mysqli_fetch_assoc($queryresult)) {

                echo "<script type='text/javascript'>

                    var par = document.getElementById('usuarioExistente');
                    var bt = document.getElementById('bruser');
                    
                    $(document).ready(function(){
                        par.hidden = false;
                        bt.hidden = true;
                    });
                
                        
                </script>";
            }else if($s==$sc){

                echo "<script type='text/javascript'>

                    var par1 = document.getElementById('senha_nomatch');
                    var bt1 = document.getElementById('brsenha');
                    
                    $(document).ready(function(){
                        par1.hidden = true;
                        bt1.hidden = false;
                    });
                
                        
                </script>";

                echo "<script type='text/javascript'>

                    var par2 = document.getElementById('usuarioExistente');
                    var bt2 = document.getElementById('bruser');
                    
                    $(document).ready(function(){
                        par2.hidden = true;
                        bt2.hidden = false;
                    });
                
                        
                </script>";

            $sql = "insert into restaurante (nome,senha,nome_restaurante)
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
        else{
            echo "<script type='text/javascript'>

                    var par = document.getElementById('senha_nomatch');
                    var bt = document.getElementById('brsenha');
                    
                    $(document).ready(function(){
                        par.hidden = false;
                        bt.hidden = true;
                    });
                
                        
                </script>";
        }
        }
        
            
            
            
            
        
        
        ?>
        <div class='modal fade' id='ModalYes' tabindex='-1' aria-labelledby='ModalYes' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                        Cadastro realizado com sucesso
                    </div>
                    <div class='modal-footer'>
                        <a class='btn btn-primary' href="senhaadmentrar.php">Logar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class='modal fade' id='Modaleita' tabindex='-1' aria-labelledby='Modaleita' aria-hidden='true'>
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