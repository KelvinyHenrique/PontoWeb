<!DOCTYPE html>
<html lang="pt-BR">

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
            <form class="formularioempresas" method="POST" action="../php/pesquisaempresas.php" >
                <div>
                    <input class="inputsacoes" type="submit" name="valorbotao" value="Cadastrar">
                    <input class="inputsacoes" type="submit" name="valorbotao" value="Editar">
                    <input class="inputsacoes" type="submit" name="valorbotao" value="Excluir">
                </div>
            </form>
            <form action="">
                <div class="pesquisa">
                    <label for="">Pesquisa: </label>
                    <input class="inputpesquisa" type="text" name="Pesquisar" id="">
                    <input class="inputempresasimages" type="image" src="../imagens/icons/search.svg" alt="">
                </div>
            </form>
        </div>
    </div>

<?php 
require '../php/config.php';
?>









    <div class="conteiner">
        <div class="boxempresa">

            <div class="boxlistaempresa">
                <div class="titulo-empresanumero">1</div>
                <div class="razaosocialempresas">Razão Social: CASA NOVATEX EIRELI</div>
                <div class="cnpjempresas">CNPJ: 123133223/0001-3</div>
                <div class="numerofuncionariosempresas">Funcionarios: 50</div>
            </div>


        </div>
    </div>
</body>

</html>