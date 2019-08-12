<?php 
require "config.php";

if (isset($_POST) && empty($_POST) == false) {
   


    
} else {
    # code...
}



$nomefuncionariopesquisa = $_POST['pesquisanomefuncionario'];
$datapesquisa = $_POST['datapesquisa'];
$loja = $_POST['lojapesquisa'];

// PEGA HORA ORGANIZA PARA FICAR TUDO DE ACORDO COM O QUE PE SALVO NO BANCO DE DADOS
$datapesquisa = explode("-", $datapesquisa);
list($ano, $mes, $dia) = $datapesquisa; 
$datapesquisa = "$ano-$mes-$dia-";


$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE nome LIKE :nomefuncionariopesquisa AND empresa = :loja ORDER BY id");
$sql->bindValue(":nomefuncionariopesquisa", "%$nomefuncionariopesquisa%", PDO::PARAM_STR);
$sql->bindValue(":loja", $loja);
$sql->execute();

if($sql->rowCount() > 0) {
	foreach ($dados = $sql->fetchAll() as $resultadofuncionario) {
			$idpesquisafuncionario = $resultadofuncionario['id'];
    $sql = $pdo->prepare("SELECT * FROM ponto WHERE funcionario = :idpesquisafuncionario AND data = :datapesquisa");
    $sql->bindValue(":idpesquisafuncionario", "$idpesquisafuncionario");
    $sql->bindValue(":datapesquisa", $datapesquisa);
    $sql->execute();
    if($sql->rowCount() > 0 ){
        $registrosdeponto = $sql->fetch();
        echo $registrosdeponto['Entrada'];
    } else {
        echo "Não achei nada aqui parseiro";
    }
	}


} else {
    echo "Não Existe funcionario cadastrado no sistema com este nome";
}
?>