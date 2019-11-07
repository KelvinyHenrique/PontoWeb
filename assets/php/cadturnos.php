<?php 

require 'config.php';

if (isset($_POST['nome']) && isset($_POST['cod']) && isset($_POST['inicio']) && isset($_POST['pausa']) && isset($_POST['retorno']) && isset($_POST['saida']) && empty($_POST['nome']) == false && empty($_POST['cod']) == false && empty($_POST['inicio']) == false && empty($_POST['pausa']) == false  && empty($_POST['retorno']) == false && empty($_POST['saida']) == false) {  

$nome = $_POST['nome'];
$codigo = $_POST['cod'];
$turno_inicio = $_POST['inicio'];
$turno_pausa = $_POST['pausa'];
$turno_retorno = $_POST['retorno'];
$turno_saida = $_POST['saida'];

    $sql = $pdo->prepare("INSERT INTO turnos SET nome = '$nome', codigo = '$codigo', entrada = '$turno_inicio', pausa = '$turno_pausa', volta = '$turno_retorno', saida = '$turno_saida'");
    $sql->execute();
    header("Location: ../html/turnos.php");

} else {
    echo "Não entrou lá";
}


?>