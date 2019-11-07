<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turnos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>


<body onload="remover()">
    <div class="conteiner">
        <div class="conteiner-alinhamento-center">

        <!-- INICIO MENU LATERAL -->
            <div class="menulateral">
                <a href="admin.php">
                    <div class="logoempresa"><img src="../imagens/icons/circular-clock.svg" alt=""></div>
                </a>
                <a href="funcionarios.php">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/group.svg" alt=""></div>
                </a>
                <a href="horas.php">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/databaseleftbar.svg" alt=""></div>
                </a>
                <a href="empresas.php">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/skyline.svg" alt=""></div>
                </a>
                <a href="administradores.php">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/manager.svg" alt=""></div>
                </a>
                <a href="backup.html">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/hard-drive.svg" alt=""></div>
                </a>
                <a href="cadastro.php">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/add-user.svg" alt=""></div>
                </a>
                <a href="turnos.php">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/settings.svg" alt=""></div>
                </a>
                <a href="sair.php">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/shut-down-icon.svg" alt=""></div>
                </a>
            </div>
                <!-- FIM MENU LATERAL -->
            <div class="bodyturnos">
                <div class="navbar-topo">
                    <div class="botoesturnos">
                        <button class="icon-btn" id="adicionarturno" onclick="mostrar()">Adicionar Turno</button>
                    </div>
                </div>
                <div class="box-cadastrar-turnos" id="turnoempresa">
                    <form class="formenviarturnos" action="../php/cadturnos.php" method="POST">
                    <div class="box-cadastro-turnos">
                        <div class="turnos-box-inputins">
                            <div>Nome:</div>
                            <div class="in-putin-turnos"><input name="nome" type="text"></div>
                        </div>
                        <div class="turnos-box-inputins">
                            <div>Código</div>
                            <div class="in-putin-turnos"><input  name="cod" type="text"></div>
                        </div>
                    </div>
                    <div class="box-cadastro-turnos">
                        <div class="turnos-box-inputins">
                            <div>Inicio</div>
                            <div class="in-putin-turnos">
                                <select name="inicio" id="">
                                    <option value="0">Selecione</option>
                                    <option value="08:30:00">08:30:00</option>
                                    <option value="08:45:00">08:45:00</option>
                                    <option value="09:00:00">09:00:00</option>
                                    <option value="11:00:00">11:00:00</option>
                                    <option value="11:10:00">11:10:00</option>
                                    <option value="10:40:00">10:40:00</option>
                                    <option value="18:00:00">18:00:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="turnos-box-inputins">
                            <div>Pausa</div>
                            <div class="in-putin-turnos">
                                <select name="pausa" id="">
                                    <option value="">Selecione</option>
                                    <option value="10:00:00">10:00:00</option>
                                    <option value="10:30:00">10:30:00</option>
                                    <option value="11:00:00">11:00:00</option>
                                    <option value="11:30:00">11:30:00</option>
                                    <option value="12:00:00">12:00:00</option>
                                    <option value="12:30:00">12:30:00</option>
                                    <option value="12:45:00">12:45:00</option>
                                    <option value="12:40:00">12:40:00</option>
                                    <option value="13:00:00">13:00:00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-cadastro-turnos">
                        <div class="turnos-box-inputins">
                            <div>Retorno</div>
                            <div class="in-putin-turnos">
                                <select name="retorno" id="">
                                    <option value="">Selecione</option>
                                    <option value="12:00:00">12:00:00</option>
                                    <option value="12:30:00">12:30:00</option>
                                    <option value="13:00:00">13:00:00</option>
                                    <option value="13:30:00">13:30:00</option>
                                    <option value="14:00:00">14:00:00</option>
                                    <option value="14:30:00">14:30:00</option>
                                    <option value="15:00:00">15:00:00</option>
                                    <option value="15:30:00">15:30:00</option>
                                    <option value="16:00:00">16:00:00</option>
                                </select>

                            </div>
                        </div>
                        <div class="turnos-box-inputins">
                            <div>Pausa</div>
                            <div class="in-putin-turnos">
                                <select name="saida" id="">
                                    <option value="">Selecione</option>
                                    <option value="10:30:00">10:30:00</option>
                                    <option value="18:30:00">18:30:00</option>
                                    <option value="19:00:00">19:00:00</option>
                                    <option value="12:30:00">12:30:00</option>
                                    <option value="12:40:00">12:40:00</option>
                                    <option value="13:10:00">13:10:00</option>
                                </select>

                            </div>
                        </div>
                        
                    </div>
                    <div class="turnos-botao-cadastrar">
                            <button>Enviar</button>
                        </div>
                    </form>
                    <div class="turnos-botao-fechar">
                        <button class="btn-close" onclick="ocultar()">X</button>
                    </div>
                </div>

                <div class="info-turnos">
                    <div class="table-info-turnos">
                        <div class="titulo-turnos">TURNOS</div>
                        <div>
                            <table class="tabela-turnos">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Código</th>
                                        <th>Inicio</th>
                                        <th>Pausa</th>
                                        <th>Retorno</th>
                                        <th>Saída</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                    require '../php/config.php';
                    $sql = $pdo->prepare("SELECT * FROM turnos");
                    $sql->execute();
                    if($sql->rowCount() > 0) {
                        foreach($turnos_resultado = $sql->fetchAll() as $dados_turnos) {
                        
                            ?>


                                    <tr>
                                        <td><?php echo $dados_turnos['nome'];?></td>
                                        <td><?php echo $dados_turnos['codigo'];?></td>
                                        <td><?php echo $dados_turnos['entrada'];?></td>
                                        <td><?php echo $dados_turnos['pausa'];?></td>
                                        <td><?php echo $dados_turnos['volta'];?></td>
                                        <td><?php echo $dados_turnos['saida'];?></td>
                                        <td>
                                            <div>
                                                <button class="botao-acoes-table">
                                                    <div>Opções</div>
                                                </button>
                                            </div>
                                            <div class="box-table-opt">
                                                <button>Editar</button>
                                                <button>Remover</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</body>
<script type="text/javascript" src="../js/turnos.js"></script>

</html>