<?php

//php principal para conferir se os dados conferem com os salvos no BD
//Também retorna erro para o front avisando possiveis erros

$errors = array();
$response = array();

$login = $_POST['login'];
$senha = md5($_POST['senha']);
$con = new mysqli("localhost", "root", "", "gulag");

//Verifica login
if(empty($login)){
  $errors['login'] = 'Login é necessário!';
}
elseif (ctype_alnum($login) == false) {
  $errors['login'] = 'Login só pode conter letras e números';
}
else {
  $queryn = mysqli_query($con,"SELECT * FROM conta where login='$login'");
  if (mysqli_num_rows($queryn) == 0){
      $errors['login'] = 'Login Inexistente!';
      $con->close();
  }
}

//Verifica senha
if(empty($_POST['senha'])){
  $errors['senha'] = 'Senha é necessária!';
}
elseif (mysqli_num_rows($queryn) != 0) {
  $query = mysqli_query($con,"SELECT * FROM conta where senha='$senha'");
  if (mysqli_num_rows($query) == 0){
      $errors['senha'] = 'Senha Errada!';
      $con->close();
  }
}

$response['errors'] = $errors;

if(!empty($errors)){
  $response['success'] = false;
  $response['message'] = 'FAIL!';
}
else {
  $response['success'] = true;
  $response['message'] = 'SUCCESSO!';

  //Inicia sessão
  session_start();
  $_SESSION["user"] = $login;

  //Puxando variáveis do BD
  $cana = mysqli_fetch_assoc(mysqli_query($con,"SELECT cana FROM ponto where loginID = '$login'"));
  $bolsonaro = mysqli_fetch_assoc(mysqli_query($con,"SELECT bolsonaro FROM ponto where loginID = '$login'"));
  $facao = mysqli_fetch_assoc(mysqli_query($con,"SELECT facao FROM ponto where loginID = '$login'"));
  $maquina = mysqli_fetch_assoc(mysqli_query($con,"SELECT maquina FROM ponto where loginID = '$login'"));

  //Salvando variáveis do BD em cookies
  setcookie("cana", $cana['cana']);
  setcookie("bolsonaro", $bolsonaro['bolsonaro']);
  setcookie("facao", $facao['facao']);
  setcookie("maquina", $maquina['maquina']);

  $con->close();
}

echo json_encode($response);
?>
