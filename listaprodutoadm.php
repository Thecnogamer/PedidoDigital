<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Pedido Digital - Inserir Produto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body background-color="#fffff4">

  <?php include "navbar.php"; ?>

  <div class='modal fade' id='excluirmodal' tabindex='-1' aria-labelledby='excluirmodalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-body'>
          <p id="excluirmodaltxt">Deseja excluir esse produto?</p>
        </div>
        <div class='modal-footer'>
          <a id="confexcl" href="" class='btn btn-primary'>Sim</a>
          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Não</button>
        </div>
      </div>
    </div>
  </div>
  <div class='modal fade' id='sucessomodal' tabindex='-1' aria-labelledby='excluirmodalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-body'>
          <p id="excluirmodaltxt">Produto excluido com sucesso</p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Ok</button>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <br>
    <br>
    <center>
      <div class="row">



        <?php



        include "conn.php";

        $r = $_SESSION["rest"];

        $sql = "select * from produto where id_restaurante = $r";

        $resul = mysqli_query($conn, $sql);

        while ($dados = mysqli_fetch_assoc($resul)) {

          $id = $dados["id"];
          $n = $dados["nome"];
          $p = $dados["preco"];
          $t = $dados["tipo"];
          $d = $dados["descricao"];
          $a = $dados["adendum"];
          $i = $dados["foto"];
          
          $pastaArquivos = "imagens/produtos/";
          
          echo( "
                <div class='col-6 col-sm-4'>
                    <div class='card' onclick='modalquery(this)' style='width: 18rem; cursor:pointer;' data-bs-toggle='modal' data-bs-target='#query'>
                        <img id='fotoquery' src='$pastaArquivos$i' class='card-img-top' alt='$n' style='height: 150px; object-fit: cover'>
                        <div class='card-body'>
                            <h5 class='card-title'id='nomequery' >$n</h5>
                            <p class='card-text' id='precoquery'>R$: $p</p>
                            <p id='descquery' hidden >$d</p>
                            <p id='addquery' hidden >$a</p>
                            <p id='tipoquery' hidden >$t</p>
                            <a class='btn btn-info' href='alterarproduto.php?id=$id'> Editar </a>
                            <a class='btn btn-danger' data-value='$id' data-bs-toggle='modal' data-bs-target='#excluirmodal' onclick='queryid(this)'> Excluir </a>
                        </div>
                    </div>
                </div>
                <br>
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

            console.log(nome);

            var pers = document.getElementById("#querypers")

            if (adendum != "") {
              document.getElementById("querypers").hidden = false;
            } else {
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

        <script>
          function queryid(anchor) {

            var id = anchor.getAttribute("data-value");

            document.querySelector("#confexcl").href = "excluirproduto.php?id=" + id;
          }
        </script>

        <?php


        if (isset($_SESSION["Voltando"]) && $_SESSION["Voltando"] == "sucesso") {


          echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#sucessomodal').modal('show');
          });
          </script>";

          unset($_SESSION["Voltando"]);
        }


        ?>


      </div>
    </center>
  </div>

</body>

</html>