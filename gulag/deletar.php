<?php
  //Deleta usuario do banco, destroi a sessão e destroi os cookies
  session_start();
  if(!isset($_SESSION['user'])){
    header('Location: '. 'index.html');
  }
  $user = $_SESSION["user"];

  //Atualizando banco
  $con = new mysqli("localhost", "root", "", "gulag");
  $sql = "DELETE FROM conta WHERE login = '$user'";
  mysqli_query($con, $sql);

  //Destruindo sessão e cookies
  session_destroy();
  setcookie("user", "", time() - 3600);
  setcookie("cana", "", time() - 3600);
  setcookie("bolsonaro", "", time() - 3600);
  setcookie("facao", "", time() - 3600);
  setcookie("maquina", "", time() - 3600);

  header('Location: '. 'index.html');

?>

<!--Redirecionando para index-->
<script type="text/javascript">location.href = 'index.html';</script>
