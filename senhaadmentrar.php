<!DOCTYPE html>
<html>
    <head>
        <title>Pedido Digital -Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <?php include_once "navbar.php"; ?>
        <div class='modal fade' id='sucessomodal' tabindex='-1' aria-labelledby='excluirmodalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                        <p id="excluirmodaltxt">Usuário e/ou senha incorreto(s)</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tentar novamente</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <br>
            <br>
            <form class="row gy-2 gx-3 align-items-center" name="frmLogin" action="" method="POST">
                <div class="col-auto">
                <h2> Login </h2>
                <label class = "form-label" for="usuario">Usuário</label>
                <input class = "form-control" type="text" name="usuario">
               
                <br>
                
                <label class = "form-label" for="senha">Senha</label>
                <input class = "form-control" type="password" name="senha">

                <br>
               
                <input class = "btn btn-success" type="submit" name="logar" value="Logar">
                <a class="btn btn-secondary" href="cadastro.php">Cadastre-se</a>
                </div>
            </form>

        </div>

    <?php 

        
        if (isset($_POST["logar"])) {
            $usuario=$_POST['usuario'];
            $senha=$_POST['senha'];
    
            include_once("conn.php");
    
            if ($conn==true) {
                $sql="select * from restaurante where nome='$usuario' and senha='$senha'";
    
                $verifica = mysqli_query($conn,$sql);
    
                if (mysqli_num_rows($verifica)<=0) {
                    echo "<script type='text/javascript'>
                        $(document).ready(function(){
                        $('#falhamodal').modal('show');
                        });
                        </script>";
                } 
                else {
                    if($dados=mysqli_fetch_assoc($verifica)){
    
                        $n=$dados["nome"];
                        $r=$dados["nome_restaurante"];
    
                        session_start();
    
                        $_SESSION["adm"]="ativar";
    
                        header("Location: ".$_SERVER['HTTP_REFERER']);

    
                    }
                }
                
    
            }
        }
        
    ?>
    </body>
</html>


