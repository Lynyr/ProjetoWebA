<?php
  //Destroi a sessão e salva valores atualizados dos cookies no banco e destroi eles em seguida
  session_start();

  //Salvando variáveis
  $cana = $_COOKIE["cana"];
  $bolsonaro = $_COOKIE["bolsonaro"];
  $facao = $_COOKIE["facao"];
  $maquina = $_COOKIE["maquina"];
  $user = $_SESSION["user"];

  //Atualizando banco
  $con = new mysqli("localhost", "root", "", "gulag");
  $sql = "UPDATE ponto SET cana='$cana', bolsonaro='$bolsonaro', facao='$facao', maquina='$maquina' WHERE loginID = '$user'";
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
