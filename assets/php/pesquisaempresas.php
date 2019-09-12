<?php 
require 'config.php';
if(isset($_POST['valorbotao'])){
    $encaminhamentoempresas = $_POST['valorbotao'];
    echo "Entrou aqui".$encaminhamentoempresas;
}

$sql = $pdo->prepare("SELECT * FROM empresas");
$sql ->execute();
$empresas = $sql->fetchAll();
print_r($sql);



?>