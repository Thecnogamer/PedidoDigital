<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Exclusão de produto</title>
    <meta name="viewport" content="width=device-width, initial-scale 1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <?php

            include_once "conn.php";

            $id=$_GET["id"];

            $pastadearquivos="imagens/produtos/";

            $sql1="select * from produto where id = $id";

            $resul1=mysqli_query($conn,$sql1);

            $dados=mysqli_fetch_assoc($resul1);
            $i=$dados["foto"];

            $sql2="delete from produto where id=$id";
            $resul2=mysqli_query($conn,$sql2);

            if($resul2){

                unlink($pastadearquivos.$i);
                session_start();
                $_SESSION["Voltando"]="sucesso";
                header("Location:listaprodutoadm.php");
            }
            else{
                echo "Infelizmente o produto não pôde ser excluído";
            }
        ?>
    </div>
</body>
</html>