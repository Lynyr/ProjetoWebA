<?php

//php que faz validação e insere contas novas no banco de dados,
//também realiza retorno para o front end avisando possiveis erros

$errors = array();
$response = array();

$login = $_POST['login'];
$senha = $_POST['senha'];
$senhaconfirm = $_POST['senhaconfirm'];
$con = new mysqli("localhost", "root", "", "gulag");

//Verifica se o login é valido.
if(empty($login)){
  $errors['login'] = 'Login é necessário!';
}
elseif (ctype_alnum($login) == false) {
  $errors['login'] = 'Login só pode conter letras e números';
}
else {
  $query = mysqli_query($con,"SELECT * FROM conta where login='$login'");
  if (mysqli_num_rows($query) != 0){
      $errors['login'] = 'Login já está em uso.';
      $con->close();
  }
}

//Verifica se a senha é valida
if(empty($senha)){
  $errors['senha'] = 'Senha é necessária!';
}
if($senhaconfirm !== $senha){
  $errors['senhaconfirm'] = 'Senhas diferentes';
}

//Salva erros para enviar para o front
$response['errors'] = $errors;

//Confirmação para o Ajax e insert no BD
if(!empty($errors)){
  $response['success'] = false;
  $response['message'] = 'FAIL!';
}
else {
  //Salvando senha com criptografia md5
  $senha = md5($senha);
  $sql = "INSERT INTO conta (login, senha) VALUES ('$login', '$senha');";
  $sql .= "INSERT INTO ponto (loginID) VALUES ('$login');";
  mysqli_multi_query($con, $sql);
  $con->close();
  $response['success'] = true;
  $response['message'] = 'SUCCESSO!';
}

echo json_encode($response);

?>
