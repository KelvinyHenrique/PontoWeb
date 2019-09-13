<!DOCTYPE html>
<html lang="pt-BR">
<?php require '../php/config.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Área de Administração</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="conteiner">
        <div class="navbartopoint">
            <form class="formularioempresas" method="POST" action="../php/pesquisaempresas.php">
                <div>
                    <input class="inputsacoes" type="submit" name="valorbotao" value="Cadastrar">
                    <input class="inputsacoes" type="submit" name="valorbotao" value="Editar">
                    <input class="inputsacoes" type="submit" name="valorbotao" value="Excluir">
                </div>
            </form>

            <?php 
if(isset($_POST['valorbotao'])){
    $encaminhamentoempresas = $_POST['valorbotao'];
    echo "Entrou aqui".$encaminhamentoempresas;
}
?>
            <form method="POST">
                <div class="pesquisa">
                    <label for="">Pesquisa: </label>
                    <input class="inputpesquisa" type="text" name="pesquisar">
                    <input class="inputempresasimages" type="image" src="../imagens/icons/search.svg" alt="">
                </div>
            </form>

            </div>
    </div>
    <div class="conteiner">
        <div class="boxempresa">
            <?php 
if (isset($_POST['pesquisar']) && empty($_POST['pesquisar']) == false) {
    $pesquisaempresa = $_POST['pesquisar'];
    $sql = $pdo->prepare("SELECT * FROM empresas WHERE rz_social LIKE  :nomeempresa ORDER BY ordem ASC");
    $sql->bindValue(":nomeempresa", "%$pesquisaempresa%");
    $sql->execute();
    if ($sql->rowCount() > 0) {
        foreach($formpesquisaempresa = $sql->fetchAll() as $lista)
        {    
            ?>
            <div class="boxlistaempresa">
                <div class="titulo-empresanumero"><?php echo $lista['ordem'];?></div>
                <div class="razaosocialempresas">Razão Social: <?php echo $lista['rz_social'];?></div>
                <div class="cnpjempresas">CNPJ: <?php echo $lista['cnpj'];?></div>
                <div class="numerofuncionariosempresas">Funcionarios: 30</div>
            </div>


            <?php }?>


            <?php
    } else {
        $sql = $pdo->prepare("SELECT * FROM empresas");
$sql ->execute();
foreach ($empresas = $sql->fetchAll() as $lista) {    
?>
            <div class="boxlistaempresa">
                <div class="titulo-empresanumero"><?php echo $lista['ordem'];?></div>
                <div class="razaosocialempresas">Razão Social: <?php echo $lista['rz_social'];?></div>
                <div class="cnpjempresas">CNPJ: <?php echo $lista['cnpj'];?></div>
                <div class="numerofuncionariosempresas">Funcionarios: 30</div>
            </div>
            <?php }}}
?>

        </div>
    </div>
</body>

</html>