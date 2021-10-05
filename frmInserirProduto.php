<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>Pedido Digital - Inserir Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        <?php
    
        include "navbar.php";
    
        ?>
        <div class='modal fade' id='ModalYes' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                        Produto inserido com sucesso
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Inserir outro</button>
                        <button type='button' class='btn btn-primary' href="index.php">Voltar para Início</button>
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
                        <button type='button' class='btn btn-primary' href="index.php">Voltar para Início</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
        <h2>Inserir Produto</h2>
        <form name="insProduto" action="" method="POST" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-sm-7">
                    <div class="mb-3">
                        <center>
                        <img id="output" height="300px"/>
                        <label id="labelfile" for="formFile" class="form-label" >Insira uma foto do produto<br> Preferívelmente 16:9</label>
                        </center>
                        <br>
                        <input class="form-control" type="file" id="formFile" name="foto" accept="image/*" required onchange="loadFile(event)">
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
                    <input class="form-control" type="text" name="nome" required="required">
                    <label for="preco">Preço do produto</label><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">R$</span>
                        </div>
                        <input class="form-control" type="number" name="preco" required="required" step=".01">
                    </div>
                    <label for="tipo">Tipo do Produto</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" required="required" value=3> Bebida<br>
                        <input class="form-check-input" type="radio" name="tipo" required="required" value=1> Prato Feito<br>
                        <input class="form-check-input" type="radio" name="tipo" required="required" value=2> Porção<br>
                        <input class="form-check-input" type="radio" name="tipo" required="required" value=4> Sobremesa
                    </div>
                    <br>
                    <div class="btn-group" role="group" aria-label="Btn limpar inserir">
                        <input class="btn btn-success" type="submit" name="inserir" value="Inserir" >
                        <input class="btn btn-danger" type="reset" name="limpar" value="Limpar">
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="descricao">Ingredientes</label><br>
                    <textarea class="form-control form-control-sm" name="descricao" required></textarea>
                </div>
                <div class="col">
                    <label for="adendum">Adendos</label><br>
                    <textarea class="form-control form-control-sm" name="adendum" placeholder="Queijo extra, Cebola caramelizada etc"></textarea>
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

            if ($f != "") {
                $pastaarquivos = "imagens/produtos/";
                $nomearquivo= $f;
                $nometemp = $_FILES["foto"]["tmp_name"];
                move_uploaded_file($nometemp, $pastaarquivos.$nomearquivo);
            }

            include "conn.php";

            $sql="insert into produto(nome, preco, tipo, descricao, adendum, foto) values('$n','$p','$t','$d','$a','$f')";

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