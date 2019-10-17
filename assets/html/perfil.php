<?php 
require '../php/config.php';
if(isset($_POST['funcionario'])){
    $botaofuncionario = $_POST['funcionario'];
    $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE id = :botaofuncionario");
    $sql->bindValue(":botaofuncionario", $botaofuncionario);
    $sql->execute();
    // VARIAVEIS INFORMAÇÕES 
    if ($sql->rowCount() > 0) {
        $infofuncionario = $sql->fetch();
        $idfuncionarioperfil = $botaofuncionario;
        $nomefuncionario = $infofuncionario['nome'];
        $funcao = $infofuncionario['funcao'];
        $empresa = $infofuncionario['empresa'];
        $nascimento = $infofuncionario['nascimento'];
        $email = $infofuncionario['email'];
        $infosenha = $infofuncionario['senha'];
        $usuario = $infofuncionario['usuario'];
        $pinuser =  $infofuncionario['pin']; 
        $cpfuser = $infofuncionario['cpf'];
        setcookie("funcionario", $idfuncionarioperfil);
        $previanome = $nomefuncionario;
        list($nome, $sobrenome) = explode(' ', $previanome, 3);
    }
    else {
        header("Location: funcionarios.php");
    }
}     else {
    header("Location: funcionarios.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="conteiner">
        <div class="perfil-funcionario">
            <div class="box-perfil-pessoal">
                <div class="topo-perfil">
                    <div class="perfil-body">
                        <img src="../imagens/icons/perfil/boy.svg" alt="">
                    </div>
                    <div class="prev-infos">
                        <h3><?php echo $nome." ".$sobrenome;?></h3>
                        <h3><?php echo $funcao; ?></h3>
                        <h3><?php echo $empresa; ?></h3>
                    </div>
                </div>
                <div class="box-info-perf">
                    <div class="box-perfil-dados">
                        <p>Nome completo:<?php echo " ".$nomefuncionario; ?></p>
                        <p>Data Nascimento:<?php echo " ".$nascimento; ?></p>
                        <p>Email:<?php echo " ".$email; ?></p>
                        <p>Senha:<?php echo " ".$infosenha; ?></p>
                        <p>Usuario:<?php echo " ".$usuario ?></p>
                        <p>PIN:<?php echo " ".$pinuser ?></p>
                        <p>CPF:<?php echo " ".$cpfuser ?></p>
                        <div class="botao-editar">
                            <button class="botaoeditar2">Editar</button>
                        </div>

                    </div>

                </div>
            </div>
            <div class="relatoriofuncionario relatoriofunc2" id="relatoriofunc2">
                    <form class="relatoriofuncionario21" method="post" action="relatorio.php">
                          <div class="inputrelatoriofuncionario">
                    
                <div class="relatorio-widgets-funcionario">
                       <div class="div-funcionario-relatorio">Data Inicial:<input type="date" name="datainicial"></div>
                        <div class="div-funcionario-relatorio">Data Final: <input type="date" name="datafinal"></div>
                </div>

                <div>
                    <div><button class="botaogerarrelatorio">Gerar Relatorio</button></div>
                </div>
                </div>
                <!--                  
                <div class="alinhamentotriangulo">
                <div class="triangulorelatorio">
                </div>
                </div> 
                -->
                    </form>
              
              
            </div>
            <div class="widgets">
                <div class="widgets-box">
                    <div class="widgets-01">
                        <div class="circulo-perfil">5</div>
                        <div>
                            <p>Atestados</p>
                        </div>
                    </div>

                    <div class="widgets-01">
                        <div class="circulo-perfil">31</div>
                        <div>
                            <p>Faltas</p>
                        </div>
                    </div>

                    <div class="widgets-01">
                        <div class="circulo-perfil">830h</div>
                        <div>
                            <p>Horas Extras</p>
                        </div>
                    </div>

                    <div class="widgets-01">
                        <div class="circulo-perfil">34</div>
                        <div>
                            <p>Total Horas</p>
                        </div>
                    </div>

                    <div class="widgets-01">
                        <button class="botaofuncionarioperfil" id="botaoabrir">
                              <div class="circulo-perfil">12</div>
                        <div>
                            <p>Relatório</p>
                        </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="../js/abrirempresa.js"></script>
</body>
</html>