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
            <div class="menulateral">
                <a href="admin.html">
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
                <a href="turnos.html">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/settings.svg" alt=""></div>
                </a>
                <a href="sair.php">
                    <div class="icon-menu-bar-direita"><img src="../imagens/icons/shut-down-icon.svg" alt=""></div>
                </a>
            </div>
            <div class="bodyturnos">
                <div class="barra-superior-horas">
                    <div class="botoesturnos">
                        <button class="icon-btn" id="adicionarturno" onclick="mostrar()">Adicionar Turno</button>
                    </div>
                </div>
                <div class="box-cadastrar-turnos" id="turnoempresa">
                    <form class="formenviarturnos">
                    <div class="box-cadastro-turnos">
                        <div class="turnos-box-inputins">
                            <div>Nome:</div>
                            <div class="in-putin-turnos"><input type="text"></div>
                        </div>
                        <div class="turnos-box-inputins">
                            <div>Código</div>
                            <div class="in-putin-turnos"><input type="text"></div>
                        </div>
                    </div>
                    <div class="box-cadastro-turnos">
                        <div class="turnos-box-inputins">
                            <div>Inicio</div>
                            <div class="in-putin-turnos">
                                <select name="" id="">
                                    <option value="">Selecione</option>
                                    <option value="">08:30:00</option>
                                    <option value="">08:45:00</option>
                                    <option value="">09:00:00</option>
                                    <option value="">11:00:00</option>
                                    <option value="">11:10:00</option>
                                    <option value="">10:40:00</option>
                                    <option value="">18:00:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="turnos-box-inputins">
                            <div>Pausa</div>
                            <div class="in-putin-turnos">
                                <select name="" id="">
                                    <option value="">Selecione</option>
                                    <option value="">10:00:00</option>
                                    <option value="">10:30:00</option>
                                    <option value="">11:00:00</option>
                                    <option value="">11:30:00</option>
                                    <option value="">12:00:00</option>
                                    <option value="">12:30:00</option>
                                    <option value="">12:45:00</option>
                                    <option value="">12:40:00</option>
                                    <option value="">13:00:00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-cadastro-turnos">
                        <div class="turnos-box-inputins">
                            <div>Retorno</div>
                            <div class="in-putin-turnos">
                                <select name="" id="">
                                    <option value="">Selecione</option>
                                    <option value="">12:00:00</option>
                                    <option value="">12:30:00</option>
                                    <option value="">13:00:00</option>
                                    <option value="">13:30:00</option>
                                    <option value="">14:00:00</option>
                                    <option value="">14:30:00</option>
                                    <option value="">15:00:00</option>
                                    <option value="">15:30:00</option>
                                    <option value="">16:00:00</option>
                                </select>

                            </div>
                        </div>
                        <div class="turnos-box-inputins">
                            <div>Pausa</div>
                            <div class="in-putin-turnos">
                                <select name="" id="">
                                    <option value="">Selecione</option>
                                    <option value="">10:30:00</option>
                                    <option value="">18:30:00</option>
                                    <option value="">19:00:00</option>
                                    <option value="">12:30:00</option>
                                    <option value="">12:40:00</option>
                                    <option value="">13:10:00</option>
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
                                    <tr>
                                        <td>Turnos 1</td>
                                        <td>23</td>
                                        <td>8:30:00</td>
                                        <td>12:00:00</td>
                                        <td>14:00:00</td>
                                        <td>18:30:00</td>
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
                                    <tr>
                                        <td>Turnos 1</td>
                                        <td>23</td>
                                        <td>8:30:00</td>
                                        <td>12:00:00</td>
                                        <td>14:00:00</td>
                                        <td>18:30:00</td>
                                    </tr>
                                    <tr>
                                        <td>Turnos 1</td>
                                        <td>23</td>
                                        <td>8:30:00</td>
                                        <td>12:00:00</td>
                                        <td>14:00:00</td>
                                        <td>18:30:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</body>
<script type="text/javascript" src="../js/turnos.js"></script>

</html>