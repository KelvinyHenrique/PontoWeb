<?php
session_start();
require '../php/config.php';

if(isset($_SESSION['admin']) && empty($_SESSION['admin']) == false){
    $sql = $pdo->prepare("SELECT * FROM funcionarios");
    $sql->execute();
    if($sql->rowCount() > 0){
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
    <div class="conteiner">

        <div class="body-funcionarios-li">

            <div class="topo-funcionarios">
                <div class="titulo-funcionarios">
                    <h3>Lista de Funcionarios</h3>
                </div>
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
            <div class="conteiner">
                <hr class="linha" />
            </div>
            <div class="lista-funcionarios-conteiner">
                <?php          foreach ($funcionarios = $sql->fetchAll() as $lista) {
           ?>
                <div class="box-funcionarios-info">
                   
                   <form action="funcionarios.html" method="post">

                 <button type="submit" value="<?php $lista['nome'];?>">
                            <a href="perfil.html">
                        <div class="circulo-body">
                            <?php  if ($lista['status'] == 2) {
                            echo '<div class="circulo-desativados"></div>';
                        } else {
                            echo '<div class="circulo-ativo"></div>';
                        } 
                        ?>
                        </div>
                        <div class="imagem-box-perfil"><img src="../imagens/icons/perfil/boy.svg" alt=""></div>
                        <div class="nome-funcionario"><?php echo $lista['nome']; ?></div>
                        <div class="setor-funcionario"><?php echo $lista['funcao']; ?></div>
                        <div class="loja-funcionario"><?php echo $lista['empresa']; ?></div>
                    </a>
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
    </div>
</body>



</html>