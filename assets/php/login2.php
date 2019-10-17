<?php
session_start();
require 'config.php';

if(isset($_POST['usuario']) && empty($_POST['usuario']) == false){
  $usuario = addslashes($_POST['usuario']);
  $senha = addslashes($_POST['senha']);

  $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE usuario = :usuario AND senha = :senha AND administrador = '1'");
  $sql->bindValue(":usuario", $usuario);
  $sql->bindValue(":senha", $senha);
  $sql->execute();

    if($sql->rowCount() > 0){

            $sql = $sql->fetch();
            $_SESSION['admin'] = $sql['id'];
            header("Location: ../html/admin.html");
    } else {
      header("Location: ../html/login2.html");
    } 

} else {
 header("Location: ../html/login2.html");
}

?>