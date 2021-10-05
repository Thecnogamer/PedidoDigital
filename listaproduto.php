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

            $sql="select * from produto";

            $resul=mysqli_query($conn,$sql);

            while($dados=mysqli_fetch_assoc($resul)){

                
                $id = $dados["id"];
                $n = $dados["nome"];
                $p = $dados["preco"];
                $i = $dados["foto"];
                $d = $dados["descricao"];
                $a = $dados["adendum"];
                $pastaArquivos = "imagens/produtos/";

                echo "
                <div class='col'>
                    <div class='card' style='width: 18rem; cursor:pointer;' data-bs-toggle='modal' data-bs-target='#query'>
                        <img src='$pastaArquivos$i' class='card-img-top' alt='$n' style='height: 150px; object-fit: cover'>
                        <div class='card-body'>
                            <h5 class='card-title'>$n</h5>
                            <p class='card-text'>R$: $p</p>
                            <p style='display:none;'>$id</p>
                            <p style='display:none;'>$d</p>
                            <p style='display:none;'>$a</p>
                        </div>
                    </div>
                </div>
                ";
            }
        
        
        
        
        ?>

<div class="modal fade" id="query" tabindex="-1" aria-labelledby="queryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="queryLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


            </div>
        </div>
   </body>
</html>