<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Funcionarios</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>

<body>
    <div class="conteiner">
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

                <div class="navbar-cadastro">
                    <p>Cadastro</p> 
                </div>

        <div class="box-form-01">
            <form action="../php/cadastrar.php" class="box-11-form" method="post">
                <div class="box-cadastro box11">

                    <input type="text" placeholder="Nome" name="nome" required>
                    <input type="text" name="cpf" maxlength="14" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)">
                    <input type="date" placeholder="Data Nascimento" name="nascimento" required>
                </div>
                <div class="box-cadastro">
                    <input type="text" placeholder="Usuario" name="usuario">
                    <input type="text" placeholder="Função" name="funcao" required>
                    <input type="password" placeholder="Senha" name="senha" required>
                </div>
                <div class="box-cadastro">
                    <input type="email" placeholder="Email" name="email" required>
                    <select name="empresa" class="cad-func-empresa">
                            <?php 
                            
                                require '../php/config.php';
                                $sql = $pdo->prepare("SELECT * FROM empresas");
                                $sql->execute();
                                if($sql->rowCount() > 0) {
                                    foreach($nometurnos = $sql->fetchAll() as $resultadopesquisaempresa) {
                                         ?>
                                        <option value="<?php echo $resultadopesquisaempresa['rz_social']; ?>"><?php echo $resultadopesquisaempresa['rz_social'];  ?></option> <?php }} ?>
                    </select>
                    <input type="text" name="telefone" maxlength="12" placeholder="Telefone" OnKeyPress="formatar('# ####-####', this)">
                </div>
                <div class="box-turnos-funcionario">

                    <select name="turnos" id="select-cadfuncionarios">
                        <option>Turnos</option>
                        <?php 
                        require '../php/config.php';
                        $sql = $pdo->prepare("SELECT nome from turnos");
                        $sql->execute();
                        if ($sql->rowCount() > 0) {
                            foreach($dadosturnos = $sql->fetchAll() as $resultadopesquisa ) {
                        ?>
                        <option value="<?php echo $resultadopesquisa['nome']; ?>"><?php echo $resultadopesquisa['nome']; ?></option> <?php }} ?>
                    </select>

                    <input type="password" placeholder="PIN" name="pin" required>
                </div>
                <div class="upload-arquivos">
                    <div class="upload-box-icons">
                        <button class="botaoimagem">Foto<img src="../imagens/icons/file.svg" alt=""></button>
                        <button class="botaodigital">Digital<i><img src="../imagens/icons/fingerprint.svg" alt=""></button>
                    </div>
                    <div class="checkboxcadastro">
                        <div>Privilegios Administrativos</div>
                        <div>
                            <input type="checkbox" id="scales" name="caixas[]" value="1">
                            <label for="sim">Sim</label>
                            <input type="checkbox" id="scales" name="caixas[]" value="2" checked>
                            <label for="nao">Não</label> 
                        </div>
                    </div>
                </div>
                <div class="botaocadastrar">
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </div>
</div>
</body>
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>


<script>
var inputs = $('[type="checkbox"]'); // colocar os inputs em cache
inputs.on('click', function() { // juntar auscultador de evento
    inputs.get().forEach(function(el) { // iterar com a array nativa
        el.checked = el == this && this.checked; // marcar ou desmarcar o elemento iterado
    }, this);
});
</script>

</html>