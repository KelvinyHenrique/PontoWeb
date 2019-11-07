<!DOCTYPE html>
<html lang="pt-BR">
<?php require '../php/config.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Área de Administração</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/administradores.css">

</head>
<body>
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
        
                            <div class="conteiner-box-body">
                             <div class="navbar-branca">
                               <div class="conteudo-navbar-admin"> <h1>Administração</h1></div> 
</div>

                                <div class="conteiner-box-administradores">
                                    <div class="content-box-shawdow">
                                        <div class="navbar-preto">
                                           <p>Contas de Administradores</p> 
                                        </div>
                                        <table class="tabela-administradores">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Usuário</th>
                                                    <th>Email</th>
                                                    <th>Nível de Privilégios</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                        <?php 
                                        require '../php/config.php';
                                        $sql = $pdo->prepare("SELECT nome, usuario, email, administrador  FROM funcionarios WHERE administrador = '1'");
                                        $sql->execute();
                                        if ($sql->rowCount() > 0) {
                                            foreach ($pesquisafuncionario = $sql->fetchAll() as $valorpesquisaadministradores) {                                             
                                                ?>
                                                <tr>
                                                <td><?php echo $valorpesquisaadministradores['nome']; ?></td>
                                                <td><?php echo $valorpesquisaadministradores['usuario']; ?></td>
                                                <td><?php echo $valorpesquisaadministradores['email']; ?></td>
                                                <td><?php echo $valorpesquisaadministradores['administrador']; ?></td>
                                                </tr>
                                                <?php }}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                          
                            </div>
                                         
</body>
</html>