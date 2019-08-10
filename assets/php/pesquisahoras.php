<?php 
require "config.php";
$nomefuncionariopesquisa = $_POST['pesquisanomefuncionario'];
$datapesquisa = $_POST['datapesquisa'];
$loja = $_POST['lojapesquisa'];


$datapesquisa = explode("-", $datapesquisa);
list($dia, $mes, $ano) = $datapesquisa; 
$datapesquisa = "$ano-$mes-$dia";
echo $datapesquisa;




$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE nome LIKE :nomefuncionariopesquisa AND empresa = :loja ORDER BY id");
$sql->bindValue(":nomefuncionariopesquisa", "%$nomefuncionariopesquisa%", PDO::PARAM_STR);
$sql->bindValue(":loja", $loja);
$sql->execute();

if($sql->rowCount() > 0) {
    $dados = $sql->fetch();
    $idpesquisafuncionario = $dados['id'];
    echo $idpesquisafuncionario;

    $sql = $pdo->prepare("SELECT * FROM ponto WHERE funcionario = :idpesquisafuncionario AND data LIKE :datapesquisa");
    $sql->bindValue(":idpesquisafuncionario", "%$idpesquisafuncionario%");
    $sql->bindValue(":datapesquisa", $datapesquisa);
    $sql->execute();
    if($sql->rowCount() > 0 ){
        $registrosdeponto = $sql->fetch();
        echo $registrosdeponto['entrada'];
    }
} else {
    echo "Não Existe funcionario cadastrado no sistema com este nome";
}
?>