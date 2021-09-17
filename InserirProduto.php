<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>Pedido Digital - Inserir Produto</title>
    <link href="CSS/Style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
                echo "<h3> Produto registrado com sucesso </h3>";
                header("refresh:2;url=frminserirproduto.php");
            }
            else{
                echo "<h3> Erro ao cadastrar produto</h3>";
            }

           ?>
       </div>
   </body>
</html>