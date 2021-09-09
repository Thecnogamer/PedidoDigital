<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>Pedido Digital - Inserir Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
   </head>
   <body>
    <?php
    
     include "navbar.php";
    
    ?>
    <div class="container">
        <br>
        <h2>Inserir Produto</h2>
        <form name="insProduto" action="InserirProduto.php" method="POST">
            <div class="row g-4">
                <div class="col-sm-7">
                    <div class="mb-3">
                        <center>
                        <img id="output" height="180px"/>
                        <label id="labelfile" for="formFile" class="form-label" >Insira uma foto do produto</label>
                        </center>
                        <input class="form-control" type="file" id="formFile" accept="image/*" required onchange="loadFile(event)">
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
                    <br>
                    <div class="btn-group" role="group" aria-label="Btn limpar inserir">
                        <input class="btn btn-success" type="submit" name="inserir" value="Inserir" >
                        <input class="btn btn-danger" type="reset" name="limpar" value="Limpar">
                    </div>
                </div>
            </div>
        </form>
    </div>

   </body>
</html>