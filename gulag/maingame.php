<?php
  //Verifica se usuário está logado
  session_start();
  if(!isset($_SESSION['user'])){
    header('Location: '. 'login.html');
  }
?>

<!doctype html>
<html lang="en">
<head>
  <title>GULAG CANAVIEIRO: THE GAME (you just lost it.)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/gulag/css/bootstrap.min.css">
  <link rel="stylesheet" href="/gulag/css/style.css">
</head>
<body style="background-image:url(/gulag/img/gulagintro.jpg)">

  <!--Botao de navegacao-->

  <div class="container">
    <div class="row"><div class="h1">БЦLДБ CДИДVУЗУЯО</div></div>
    <ul class="nav">
      <form action="/gulag/desconectar.php" method="post">
        <li class="nav-item"><button type="submit" class="btn btn-danger">Desconectar</button></li>
      </form>
    </ul>
  </div>

  <!--Container principal-->

  <div class="container border rounded bg-white">
    <div class="row">

      <!--Lado esquerdo (clicker)-->

      <div class="col-md border">
        <div class="row">
          <div class="h1 text-center w-100">cana</div>
        </div>

        <!--Contador-->

        <div class="row">
          <div class="h2 text-center w-100"><span id="cana">0</span></div>
        </div>

        <!--Imagem-->

        <div class="row top-buffer">
          <div class="text-center w-100"><img alt="" src="http://localhost/gulag/img/gulagcortacana.jpeg" class="img-fluid" alt="Responsive image" id="imgChange"/></div>
        </div>

        <!--Botao com funcao-->

        <div class="row top-buffer bot-buffer">
          <div class="text-center w-100"><button type="button" onClick="botaoContador(); mudarImagem()" class="btn btn-danger">Cortar Cana</button></div>
        </div>
      </div>

      <!--Lado direito (upgrades)-->

      <div class="col-md border">

        <!--Abas Navegacao-->

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active text-danger" data-toggle="tab" href="#pessoas">Pessoas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" data-toggle="tab" href="#facao">Facão</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" data-toggle="tab" href="#maquinario">Maquinário</a>
          </li>
        </ul>

        <!--Conteudo das abas-->

        <div class="tab-content">

          <!--Pessoas-->

          <div id="pessoas" class="container tab-pane active"><br>
            <div class="h4 text-center bot-buffer">Traga pessoas para trabalhar no gulag!</div>
            <div class="row">
              <div class="col"><div class="text-left"></div></div>
              <div class="col"><div class="text-left"></div></div>
              <div class="col"><div class="text-right">Quantidade</div></div>
              <div class="col"><div class="text-right">Preço</div></div>
            </div>
            <div class="row">
              <div class="col"><div class="text-left"><button type="button" onClick="compraBolsonaro()" class="btn btn-danger">Bolsonaro</button></div></div>
              <div class="col"> <img src="/gulag/img/gulagbolsopeixe.jpg" alt="gulag canavieiro bolsonaro peixe" style="width:50px;height:50px;"> </div>
              <div class="col"><div class="h2 text-right"><span id="bolsonaro">0</span></div></div>
              <div class="col"><div class="h2 text-right"><span id="custoBolsonaro">10</span></div></div>
            </div>
          </div>

          <!--Facao-->

          <div id="facao" class="container tab-pane"><br>
            <div class="h4 text-center bot-buffer">Corte cana mais rápido!</div>
            <div class="row">
              <div class="col"><div class="text-left"></div></div>
              <div class="col"><div class="text-left"></div></div>
              <div class="col"><div class="text-right">Quantidade</div></div>
              <div class="col"><div class="text-right">Preço</div></div>
            </div>
            <div class="row">
              <div class="col"><div class="text-left"><button type="button" onClick="compraFacao()" class="btn btn-danger">Facão 15"</button></div></div>
              <div class="col"> <img src="/gulag/img/gulagfacao.jpg" alt="gulag canavieiro facao tramontina" style="width:50px;height:50px;"> </div>
              <div class="col"><div class="h2 text-right"><span id="ofacao">0</span></div></div>
              <div class="col"><div class="h2 text-right"><span id="custoFacao">10</span></div></div>
            </div>
          </div>

          <!--Maquinario-->

          <div id="maquinario" class="container tab-pane"><br>
            <div class="h4 text-center bot-buffer">Melhore a eficiencia de seus companheiros!</div>
            <div class="row">
              <div class="col"><div class="text-left"></div></div>
              <div class="col"><div class="text-left"></div></div>
              <div class="col"><div class="text-right">Quantidade</div></div>
              <div class="col"><div class="text-right">Preço</div></div>
            </div>
            <div class="row">
              <div class="col"><div class="text-left"><button type="button" onClick="compraMaquina()" class="btn btn-danger">Colheitadeira</button></div></div>
              <div class="col"> <img src="/gulag/img/gulagupgrade02.jpg" alt="gulag canavieiro colheitadeira" style="width:50px;height:50px;"> </div>
              <div class="col"><div class="h2 text-right"><span id="maquina">0</span></div></div>
              <div class="col"><div class="h2 text-right"><span id="custoMaquina">10</span></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Botão Deletar Conta-->

  <div class="container top-buffer">
    <ul class="nav">
      <form action="/gulag/deletar.php" method="post">
        <li class="nav-item"><button type="submit" class="btn btn-danger">Deletar Conta</button></li>
      </form>
    </ul>
  </div>

  <!--Scripts-->

  <script src="/gulag/script/jogo.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script>$(document).ready(atualiza())</script>
</body>
</html>
