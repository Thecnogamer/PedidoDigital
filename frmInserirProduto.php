<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>Pedido Digital - Inserir Produto</title>
    <link href="CSS/Style.css" rel="stylesheet" type="text/css">
    <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
   </head>
   <body>
    <?php
    
     include_once "navbar.php";
    
    ?>
    <div class="container">
        <br>
        <h2>Inserir Produto</h2>
        <form name="insProduto" action="InserirProduto.php" method="POST">
            <label for="nome">Nome do Produto</label><br>
            <input type="text" name="nome" required="required">
            <br>
            <label for="preco">Preço do produto</label><br>
            <input type="number" name="preco" required="required">
            <br>
            <h3>Tamanhos disponíveis</h3>
            <input type="checkbox" name="grande">
            <label for="grande">Grande</label>
            <br>
            <input type="checkbox" name="grande">
            <label for="medio">Médio</label>
            <br>
            <input type="checkbox" name="grande">
            <label for="pequeno">Pequeno</label>
            <br>
            <br><br>


        </form>
    </div>

   </body>
</html>