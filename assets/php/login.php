<?php
session_start();
require 'config.php';

if(isset($_POST['usuario']) && empty($_POST['usuario']) == false){
  $usuario = addslashes($_POST['usuario']);
  $senha = addslashes($_POST['senha']);

  $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE nome = :usuario AND senha = :senha");
  $sql->bindValue(":usuario", $usuario);
  $sql->bindValue(":senha", $senha);
  $sql->execute();

    if($sql->rowCount() > 0){

            $sql = $sql->fetch();
            $_SESSION['ponto'] = $sql['id'];
            header("Location: ../html/intervalos.html");
    } else {
      header("Location: ../html/login.html");
    } 

} else {
 header("Location: ../html/login.html");
}

?>