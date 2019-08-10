<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Funcionarios</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="conteiner">

        <div class="box-form-01">
            <div class="titulo-cadastro">
                <p>Cadastro de Funcionarios</p>
            </div>
            <form action="../php/cadastrar.php" class="box-11-form" method="post">
                <div class="box-cadastro box11">
                    <input type="text" placeholder="Nome" name="nome" required>
                    <input type="number" placeholder="CPF" name="cpf" required>
                    <input type="date" placeholder="Data Nascimento" name="nascimento" required>
                </div>

                <div class="box-cadastro">
                    <input type="text" placeholder="Usuario" name="usuario" >
                    <input type="text" placeholder="Função" name="funcao" required>
                    <input type="password" placeholder="Senha" name="senha" required>
                </div>

                <div class="box-cadastro">
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="text" placeholder="Empresa" name="empresa" required>
                    <input class="telefone" type="number" placeholder="Telefone" name="telefone">
                </div>
                <div class="upload-arquivos">
                    <div class="upload-box-icons">
                        <button class="botaoimagem">Foto<i><img src="../imagens/icons/file.svg" alt=""></i></button>
                        <button class="botaodigital">Digital<i><img src="../imagens/icons/fingerprint.svg" alt=""></i> </button>
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

</html>