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
           <?php
            
            $n=$_POST["nome"];
            $p=$_POST["preco"];
            $t=$_POST["tipo"];
            $d=$_POST["descricao"];
            $a=$_POST["adendum"];

            include "conn.php";

            $sql="insert into produto(nome, preco, tipo, desc, add) values('$n','$p','$t','$d','$a')";

            $result=mysqli_query($conn, $sql);

            if($result == true){
                echo "<h3> Produto registrado com sucesso </h3>";
            }
            else{
                echo "<h3> Erro ao cadastrar produto</h3>";
            }

           ?>
       </div>
   </body>
</html>