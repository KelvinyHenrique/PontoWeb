<?php
session_start();
require '../php/config.php';

if(isset($_SESSION['admin']) && empty($_SESSION['admin']) == false) {
} else {
  header("Location: ../../index.html");
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Área de Administração</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    
    <div class="conteiner">
                <form class="alinhamento-admin" action="../php/admin.php" method="post">
                    <div class="box-01-admin">
                            <div class="box-02-admin">
                                <button class="icon funcionariosadmin" type="submit" value="funcionarios" name="btnvalue"><i><img src="../imagens/icons/trabalhadores.svg" alt=""></i>Funcionarios</button>
                                <button class="icon horas" type="submit" value="horas" name="btnvalue">
                                    <i><img src="../imagens/icons/database2.svg" alt=""></i>
                                    <div class="titulobotaoadmin">Banco de Horas</div> 
                                </button>
                                <button class="icon empresas" type="submit" value="empresas" name="btnvalue"><i><img src="../imagens/icons/company.svg" alt=""></i>Empresas</button>
                                <button class="icon administradores" type="submit" value="administradores" name="btnvalue"><i><img src="../imagens/icons/admin.svg" alt=""></i>Administradores</button>
                            </div>
                            
                            <div class="box-02-admin">
                                <button class="icon backup" type="submit" value="backup" name="btnvalue"><i><img src="../imagens/icons/hard-disk.svg" alt=""></i>Backup</button>
                                <button class="icon cadastro" type="submit" value="cadastro" name="btnvalue"><i><img src="../imagens/icons/employee.svg" alt=""></i>Cadastro</button>
                                <button class="icon turnos" type="submit" value="turnos" name="btnvalue"><i><img src="../imagens/icons/time-passing.svg" alt=""></i>Turnos</button>
                                <button class="icon sair" type="submit" value="sair" name="btnvalue"><i><img src="../imagens/icons/sair.svg" alt=""></i>Sair</button>
                            </div>
                    </div>
                </form>
    </div>
</body>

</html>