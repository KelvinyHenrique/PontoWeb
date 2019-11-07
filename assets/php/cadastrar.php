<?php 
require  'config.php';
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$usuario = $_POST['usuario'];
$funcao = $_POST['funcao'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$empresa = $_POST['empresa'];
$turno = $_POST['turnos'];
$pin = $_POST['pin'];

/* Faz a verificação se o usuario é administrador ou não */
$_checkbox = $_POST['caixas'];
foreach($_checkbox as $_valor)
{
    $dadocheck = $_valor;
}

if ($dadocheck > 1) {
    $admin = 2;
} else {
    $admin = 1;
}
    $sql =  $pdo->prepare("INSERT INTO funcionarios SET nome = '$nome', cpf = '$cpf', nascimento = '$nascimento', usuario = '$usuario', funcao = '$funcao', senha = '$senha', email = '$email', telefone = '$telefone', administrador = '$admin', empresa ='$empresa', turno = '$turno', pin = '$pin'") ;
    $sql->execute();
    header("Location: ../html/cadastro.php");

?>