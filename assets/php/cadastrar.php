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
echo '<div>',$admin,'</div>';

/* Fim */

echo $nome,'<br/>',$cpf,'<br/>',$nascimento,'<br/>', $usuario,'<br/>', $funcao,'<br/>', $senha,'<br/>', $email,'<br/>', $telefone,'<br/>';

    $sql =  $pdo->prepare("INSERT INTO funcionarios SET nome = '$nome', cpf = '$cpf', nascimento = '$nascimento', usuario = '$usuario', funcao = '$funcao', senha = '$senha', email = '$email', telefone = '$telefone', administrador = '$admin', empresa ='$empresa'") ;
    $sql->execute();

?>