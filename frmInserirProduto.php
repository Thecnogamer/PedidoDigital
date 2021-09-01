<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>Pedido Digital - Inserir Produto</title>
    <link href="CSS/Style.css" rel="stylesheet" type="text/css">
    <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
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
                        <label for="formFile" class="form-label">Insira uma foto do produto</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <div class="col-md-4 ">
                    <label for="nome">Nome do Produto</label><br>
                    <input class="form-control" type="text" name="nome" required="required">
                    <label for="preco">Preço do produto</label><br>
                    <input class="form-control" type="number" name="preco" required="required">
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
                    <textarea class="form-control form-control-sm" name="descricao"></textarea>
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