<?php
session_start();
require '../php/config.php';

if(isset($_SESSION['admin']) && empty($_SESSION['admin']) == false) {
} else {
  header("Location: ../../index.html");
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funcionarios</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/funcionarios.css">

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
        <div class="navbar-white">
        <div class="topo-funcionarios">
              
              <div class="pesquisa-funcionarios">
                  <div class="info-funcionarios">
                      <div class="menu-ativado-green">
                          <div class="circulo-ativo"></div>
                          <div class="texto-ativos">Ativos</div>
                      </div>
                      <div class="menu-desativado-red">
                          <div class="circulo-desativados"></div>
                          <div class="texto-desativado">Desativados</div>
                      </div>
                  </div>
                  <div class="pesquisa-input-funcionarios">
                      <div><input type="search" placeholder="Pesquisar"></div>
                      <div class="icon-advanced-func"><img src="../imagens/icons/connecting-points.svg" alt=""></div>
                  </div>
              </div>
          </div>
        </div>

        <div class="body-funcionarios-li">  
            <div class="conteiner">
                <?php
session_start();
require '../php/config.php';

if(isset($_SESSION['admin']) && empty($_SESSION['admin']) == false){
    $sql = $pdo->prepare("SELECT * FROM funcionarios");
    $sql->execute();
    if($sql->rowCount() > 0){
            ?>
            </div>
            <div class="lista-funcionarios-conteiner">
                <?php          foreach ($funcionarios = $sql->fetchAll() as $lista) {
                    $linka = $lista['id'];
           ?>
                <div class="box-funcionarios-info">
                   <form  class="form-bodyfuncionarios" action="perfil.php" method="post">
                       <button type="submit" name="funcionario" value="<?php echo $linka;?>">
                        <div class="alinhamento-func">
                             <div class="circulo-body">
                            <?php  if ($lista['status'] == 2) {
                            echo '<div class="circulo-desativados"></div>';
                        } else {
                            echo '<div class="circulo-ativo"></div>';
                        } 
                        ?>
                        </div>
                        <div class="imagem-box-perfil"><img src="../imagens/icons/perfil/boy.svg" alt=""></div>
                        <div class="nome-funcionario"><?php 
                        $previanome = $lista['nome'];
                        list($nome, $sobrenome) = explode(' ', $previanome, 3);
                        echo $nome." ".$sobrenome; 
                        
                        ?></div>
                        <div class="setor-funcionario"><?php echo $lista['funcao']; ?></div>
                        <div class="loja-funcionario"><?php echo $lista['empresa']; ?></div>
                        </div>
                       </button>
                   </form>   
            </div>
                <?php
        }
    }
} else {
    echo "Você não esta logado";
}
?>
            </div>
        </div>
</body>



</html>