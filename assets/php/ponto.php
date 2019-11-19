<?php
/* Inicia uma sessão */

session_start();
require 'config.php';
date_default_timezone_set('America/Sao_Paulo');

/*Pega valor do intervalo selecionado */
$intervalo_selecinado='';
if(isset($_POST['btnvalue'])){
$intervalo_selecinado = $_POST['btnvalue'];
}

//PEGA DATA ATUAL 

$data = date("d/m/Y");
  
$data = explode("/", $data);
   
list($dia, $mes, $ano) = $data;
   
$data = "$ano/$mes/$dia";
 //echo $data;

// FIM DATA


//PEGA HORA ATUAL

$horaatual = date('h:i:s');

if(isset($_SESSION['ponto']) && empty($_SESSION['ponto']) == false){

    $id = $_SESSION['ponto'];
    // SELECIONA TODOS OS CAMPOS DA TABELA PONTO ONDE O ID É IGUAL AO ID DO USUARIO E A DATA É IGUAL A DATA ATUAL
    $sql = $pdo->prepare("SELECT * FROM ponto WHERE funcionario = :id AND data = :data");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":data", $data);
    $sql->execute();


    //VERIFICA SE TEM ALGUMA LINHA
    if($sql->rowCount() == 1 ) {
        $dados = $sql->fetch();
        echo $dados['funcionario']."<br/>";
        
        //LOGO TENDO UMA LINHA ENTÃO VERIFICA SE O CAMPO FOI SETADO E SE ESTÁ VAZIO
        if(isset($dados[$intervalo_selecinado]) && empty($dados[$intervalo_selecinado]) == true){
            
            //UPDATE `ponto` SET `Pausa` = '04-55' WHERE `ponto`.`id` = 17;
            $sql = $pdo->prepare("UPDATE ponto SET $intervalo_selecinado = :horaatual WHERE funcionario = :id AND data = :data" );
            $sql->bindValue(":data", $data);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":horaatual", $horaatual);
            $sql->execute();
            header("Location: ../html/sucesso.php");
            session_destroy();
        } else //SE NÃO FOI SETADO MAS ESTÁ PREENCHIDO ENTÃO PASSAR PARA A LiNHA DE BAIXO
        {   
            session_destroy();
            header("Location: ../html/erroponto.php");
            exit;
        }
    }else {
        echo $id;
        $sql = $pdo->prepare("INSERT INTO ponto SET $intervalo_selecinado = :horaatual, funcionario = :id, data = :data");
        $sql->bindValue(":horaatual", $horaatual);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":data", $data);
        $sql->execute();
        session_destroy();
        header("Location: ../html/sucesso.php");
        exit;
    }


} else {
    echo "Não foi encontrado nenhuma sessão logada";
    exit;
}

?>
