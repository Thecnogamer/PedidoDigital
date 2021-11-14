<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Pedido Digital - Inserir Produto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body background-color="#fffff4">

  <?php include "navbar.php"; ?>

  <div class="container-fluid">
    <br>
    <br>
    <center>
    <div class="row">



      <?php
      $r=$_SESSION["rest"];


      if (isset($_GET["tipo"])) {
       $tipo = $_GET["tipo"];
      }
      

      include "conn.php";

      if (isset($tipo)) {
        $sql = "select * from produto where tipo = $tipo and id_restaurante = $r";
      } else {
        $sql = "select * from produto where id_restaurante = $r";
      }
      

      

      $resul = mysqli_query($conn, $sql);

      while ($dados = mysqli_fetch_assoc($resul)) {


        $id = $dados["id"];
        $n = $dados["nome"];
        $p = $dados["preco"];
        $i = $dados["foto"];
        $d = $dados["descricao"];
        $a = $dados["adendum"];
        $t = $dados["tipo"];
        $pastaArquivos = "imagens/produtos/";

        echo("
                <div class='col-6 col-sm-4'>
                    <div class='card' onclick='modalquery(this)' style='width: 18rem; cursor:pointer;' data-bs-toggle='modal' data-bs-target='#query'>
                        <img id='fotoquery' src='$pastaArquivos$i' class='card-img-top' alt='$n' style='height: 150px; object-fit: cover'>
                        <div class='card-body'>
                            <h5 id='nomequery' class='card-title titulo'>$n</h5>
                            <p id='precoquery' class='card-text'>R$: $p</p>
                            <p id='idquery' hidden >$id</p>
                            <p id='descquery' hidden >$d</p>
                            <p id='addquery' hidden >$a</p>
                            <p id='tipoquery' hidden >$t</p>
                        </div>
                    </div>
                </div>
                ");
      }




      ?>

      <div class="modal fade" id="query" tabindex="-1" aria-labelledby="queryLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title titulo" id="queryLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <img src="" id="queryfoto" style="height: 160px; vertical-align: middle;">
                </div>
                <div class="col">
                  <p class="titulo" id="querypreco"></p>
                  <p class="titulo" id="querytipo"></p>
                  <h6 class="titulo">Ingredientes:</h6>
                  <p id="querydesc"></p>
                  <h6 class="titulo" id="querypers" hidden>Personalização:</h6>
                  <p id="queryadd"></p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>


      <script>
        function modalquery(modal) {

          var nome = modal.querySelector("#nomequery").textContent;
          var foto = modal.querySelector("#fotoquery").src;
          var preco = modal.querySelector("#precoquery").textContent;
          var desc = modal.querySelector("#descquery").textContent;
          var adendum = modal.querySelector("#addquery").textContent;
          var tipo = modal.querySelector("#tipoquery").textContent;

          document.querySelector("#queryLabel").innerText = nome;
          document.querySelector("#queryfoto").src = foto;
          document.querySelector("#querypreco").innerText = preco;
          document.querySelector("#querydesc").innerText = desc;
          document.querySelector("#queryadd").innerText = adendum;
          
          var pers = document.getElementById("#querypers")

          if (adendum != "") {
            document.getElementById("querypers").hidden = false;
          }else{
            document.getElementById("querypers").hidden = true;
          }
          switch (tipo) {

            case "1":
              document.querySelector("#querytipo").innerText = "Prato Feito";
              break;

            case "2":
              document.querySelector("#querytipo").innerText = "Porção";
              break;

            case "3":
              document.querySelector("#querytipo").innerText = "Bebida";
              break;

            case "4":
              document.querySelector("#querytipo").innerText = "Sobremesa";
              break;

            default:
              document.querySelector("#querytipo").innerText = "wtf?";
              break;

          }
        }
      </script>

    </div>
      </center>
  </div>
</body>

</html>
