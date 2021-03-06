<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>Pedido Digital - Alterar Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        <?php
    
        include "navbar.php";

include_once "conn.php";

$id = $_GET["id"];

$pastadearquivos="imagens/produtos/";

$sql1="select * from produto where id = $id";

$resul1=mysqli_query($conn,$sql1);

$dados=mysqli_fetch_assoc($resul1);

$nome = $dados["nome"];
$preco = $dados["preco"];
$tipo = $dados["tipo"];
$descricao = $dados["descricao"];
$adendum = $dados["adendum"];
$foto = $dados["foto"];
$promo = $dados["Promo"];
    
        ?>
        <div class='modal fade' id='ModalYes' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                        Produto alterado com sucesso
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Inserir outro</button>
                        <a type='button' class='btn btn-primary' href="listaprodutoadm.php">Voltar para a lista</a>
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
                        <a type='button' class='btn btn-primary' href="listaprodutoadm.php">Voltar para a lista</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
        <h2>Alterar Produto</h2>
        <form name="insProduto" action="" method="POST" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-sm-7">
                    <div class="mb-3">
                        <center>
                        <img id="output" height="300px" src="<?php echo"$pastadearquivos$foto" ?>"/>
                        </center>
                        <br>
                        <input class="form-control" type="file" id="formFile" name="foto" accept="image/*" onchange="loadFile(event)">
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            var label = document.getElementById('labelfile');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                              URL.revokeObjectURL(output.src)
                              label.hidden = true;
                            }
                            

                          };
                        </script>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <label for="nome">Nome do Produto</label><br>
                    <input class="form-control" type="text" name="nome" required="required" value="<?php echo"$nome" ?>">
                    <label for="preco">Pre??o do produto</label><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">R$</span>
                        </div>
                        <input class="form-control" type="number" name="preco" required="required" step=".01" value="<?php echo"$preco" ?>">
                    </div>
                    <label for="tipo">Tipo do Produto</label><br>
                    <div class="form-check">
                    <?php

                    switch ($tipo) {
                        case '1':
                            echo"<input class='form-check-input' type='radio' name='tipo' required='required' value=3> Bebida<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=1 checked> Prato Feito<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=2> Por????o<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=4> Sobremesa";
                            break;
                            case '2':
                            echo"<input class='form-check-input' type='radio' name='tipo' required='required' value=3> Bebida<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=1 > Prato Feito<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=2 checked> Por????o<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=4> Sobremesa";
                            break;
                            case '3':
                            echo"<input class='form-check-input' type='radio' name='tipo' required='required' value=3 checked>> Bebida<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=1  Prato Feito<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=2> Por????o<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=4> Sobremesa";
                            break;
                            case '4':
                            echo"<input class='form-check-input' type='radio' name='tipo' required='required' value=3> Bebida<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=1 > Prato Feito<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=2> Por????o<br>
                            <input class='form-check-input' type='radio' name='tipo' required='required' value=4 checked> Sobremesa";
                            break;
                    }
                        
                    ?>
                    </div>
                    <br>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="promo" value=1 <?php if($promo == 1){echo"checked";} ?>>
                    <label for="promo">Produto em promo????o</label>
                    </div>
                    <br>
                    <div class="btn-group" role="group" aria-label="Btn limpar inserir">
                        <input class="btn btn-success" type="submit" name="inserir" value="Alterar" >
                        <input class="btn btn-danger" type="reset" name="limpar" value="Limpar">
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="descricao">Ingredientes</label><br>
                    <textarea class="form-control form-control-sm" name="descricao" required><?php echo"$descricao" ?></textarea>
                </div>
                <div class="col">
                    <label for="adendum">Adendos</label><br>
                    <textarea class="form-control form-control-sm" name="adendum"  placeholder="Queijo extra, Cebola caramelizada etc"><?php echo"$adendum" ?></textarea>
                </div>
                <div class="col">
                    
                </div>
            </div>
        </form>
        </div>

        <?php
        if(isset($_POST["inserir"])){
            $n=$_POST["nome"];
            $p=$_POST["preco"];
            $t=$_POST["tipo"];
            $d=$_POST["descricao"];
            $a=$_POST["adendum"];
            $f=$_FILES["foto"]["name"];

            if(isset($_POST["promo"])){
            $prom = $_POST["promo"];
            }else{
            $prom = 0;    
            }

            echo"$prom";

            include "conn.php";

            if ($f != "") {
                $pastaarquivos = "imagens/produtos/";
                $nomearquivo= $f;
                $nometemp = $_FILES["foto"]["tmp_name"];
                move_uploaded_file($nometemp, $pastaarquivos.$nomearquivo);
                $sql ="UPDATE produto SET nome='$n',preco='$p',tipo='$t',descricao='$d',adendum='$a',foto='$f', Promo='$prom' WHERE id='$id'";
            }elseif ($f == "") {
                $sql ="UPDATE produto SET nome='$n',preco='$p',tipo='$t',descricao='$d',adendum='$a', Promo=$prom WHERE id='$id'";
            }

            $result=mysqli_query($conn, $sql);

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
    </body>
</html>