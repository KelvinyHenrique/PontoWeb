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
                <div>
                    <input class="inputsacoes" id="cadastrarempresa" type="submit" name="valorbotao" value="Cadastrar" >
                    <input class="inputsacoes" type="submit" name="valorbotao" value="Editar">
                    <input class="inputsacoes" type="submit" name="valorbotao" value="Excluir">
                </div>
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
        <div class="alinhamentoempresa">
        <div class="cadastroempresa alinhamentoempresa2" id="alinhamentoempresa2">
            <form class="formcadastroempresa" method="POST" action="../php/cadastroempresa.php">
                        <div class="titulocadastro">CADASTRO</div>
            <div class="boxinputs">
            <div class="rzsocial"><input type="text" placeholder="Razão Social" name="rz_social"></div>
            <div class="cnpjempresa"><input type="text" placeholder="CNPJ" name="cnpj"></div>
            <div  class="selecaoadmin" >
                <select name="ordem" id="">
                <option value="0">Número da Empresa</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="">18</option>
                <option value="">19</option>
                <option value="">20</option>
                </select>
            </div>
            </div>
                <div class="botaocadastroempresa"><input type="submit" value="CADASTRAR"></div>
            </form>

        </div>
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
     
    </div>
</body>
<script type="text/javascript" src="../js/main.js"></script>
</html>