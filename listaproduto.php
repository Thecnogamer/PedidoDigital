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
            <div class="row row-cols-3">
    
    
 
        <?php 
            
            

            include "conn.php";

            $sql="select nome,preco,foto from produto";

            $resul=mysqli_query($conn,$sql);

            while($dados=mysqli_fetch_assoc($resul)){

                $n = $dados["nome"];
                $p = $dados["preco"];
                $i = $dados["foto"];
                $pastaArquivos = "imagens/produtos/";

                echo "
                <div class='col'>
                    <div class='card' style='width: 18rem;'>
                        <img src='$pastaArquivos$i' class='card-img-top' alt='$n'>
                        <div class='card-body'>
                            <h5 class='card-title'>$n</h5>
                            <p class='card-text'>R$: $p</p>
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