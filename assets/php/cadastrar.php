<?php 




$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$ctps = $_POST['ctps'];
$funcao = $_POST['funcao'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

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




echo $nome,'<br/>',$cpf,'<br/>',$nascimento,'<br/>', $ctps,'<br/>', $funcao,'<br/>', $senha,'<br/>', $email,'<br/>', $telefone,'<br/>';

try {
    $conexao = new PDO('mysql:host=localhost;dbname=ponto', 'root');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO funcionarios SET nome = '$nome', cpf = '$cpf', nascimento = '$nascimento', ctps = '$ctps', funcao = '$funcao', senha = '$senha', email = '$email', telefone = '$telefone', administrador = '$admin'";
    $sql= $conexao->query($sql);

} catch (PDOExeption $e) {
    //throw $th;
    echo $e;
}


?>