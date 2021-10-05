<!doctype html>
<html>
   <head>
    <meta charset="UTF-8">
    <title>Pedido Digital - Inserir Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
   </head>
   <body background-color="#fffff4">

   <?php include "navbar.php"; ?>

        <div class="container">
            <br>
            <br>
            <div class="row row-cols-3">
    
    
 
        <?php 
            
            

            include "conn.php";

            $sql="select id,nome,preco,foto from produto";

            $resul=mysqli_query($conn,$sql);

            while($dados=mysqli_fetch_assoc($resul)){

                $id = $dados["id"];
                $n = $dados["nome"];
                $p = $dados["preco"];
                $i = $dados["foto"];
                $pastaArquivos = "imagens/produtos/";

                echo "
                <div class='col'>
                    <div class='card' style='width: 18rem;' onclick>
                        <img src='$pastaArquivos$i' class='card-img-top' alt='$n' style='height: 150px; object-fit: cover'>
                        <div class='card-body'>
                            <h5 class='card-title'>$n</h5>
                            <p class='card-text'>R$: $p</p>
                            <a class='btn btn-info' href='alterarproduto.php?id=$id'> Editar </a>
                            <a class='btn btn-danger' href='excluirproduto.php?id=$id'> Excluir </a>
                        </div>
                    </div>
                </div>
                ";
            }
        
        
        
        
        ?>


            </div>
        </div>
   </body>
</html>