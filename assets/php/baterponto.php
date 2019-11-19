<?php
session_start();
require 'config.php';

if(isset($_POST['senha']) && empty($_POST['senha']) == false){
  $senha = addslashes($_POST['senha']);

  $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE senha = :senha");
  $sql->bindValue(":senha", $senha);
  $sql->execute();

    if($sql->rowCount() > 0){

            $sql = $sql->fetch();
            $_SESSION['ponto'] = $sql['id'];
            header("Location: ../html/intervalos.php");
    } else {
      header("Location: ../html/ponto.php");
    } 

} else {
 header("Location: ../html/ponto.php");
}