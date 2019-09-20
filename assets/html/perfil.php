<?php 

require '../php/config.php';
$botaofuncionario='';
if(isset($_POST['funcionario'])){
    $botaofuncionario = $_POST['funcionario'];
    $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE id = :botaofuncionario");
    $sql->bindValue(":botaofuncionario", $botaofuncionario);
    $sql->execute();
    $infofuncionario = $sql->fetch();
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
                        <h3><?php echo $infofuncionario['nome']; ?></h3>
                        <h3><?php echo $infofuncionario['funcao']; ?></h3>
                        <h3><?php echo $infofuncionario['empresa']; ?></h3>
                    </div>
                </div>
                <div class="box-info-perf">
                    <div class="box-perfil-dados">
                        <p>Nome completo:<?php echo $infofuncionario['nome']; ?></p>
                        <p>Data Nascimento:<?php echo $infofuncionario['nascimento']; ?></p>
                        <p>Email:<?php echo $infofuncionario['email']; ?></p>
                        <p>Senha:<?php echo $infofuncionario['senha']; ?></p>
                        <p>Usuario:<?php echo $infofuncionario['usuario']; ?></p>
                        <p>PIN:<?php echo $infofuncionario['pin']; ?></p>
                        <p>CPF:<?php echo $infofuncionario['cpf']; ?></p>
                        <div class="botaoeditar">
                            <button class="botaoeditar2">Editar</button>
                        </div>

                    </div>

                </div>
            </div>
            <div class="relatoriofuncionario">
                
                <div class="inputrelatoriofuncionario">
                    
                <div class="relatorio-widgets-funcionario">
                       <div class="div-funcionario-relatorio">Data Inicial:<input type="date"></div>
                        <div class="div-funcionario-relatorio">Data Final: <input type="date"></div>
                        <div class="div-funcionario-relatorio">Empresa: <select name="" id="">
                            <option value="">CA CALÇADOS EIRELI</option>
                        </select></div>
                        <div class="div-funcionario-relatorio">Funcionario: <input type="text"></div>
                </div>

                <div>
                    <div><button class="botaogerarrelatorio">Gerar Relatorio</button></div>
                </div>
                </div>
                <div class="alinhamentotriangulo">
                      <div class="triangulorelatorio">

                </div>
                </div>
              
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
                        <button class="botaofuncionarioperfil">
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
</body>

</html>