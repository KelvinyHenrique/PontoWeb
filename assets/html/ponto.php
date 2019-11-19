<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Ponto</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ponto.css">
</head>

<body>

    <div class="conteiner">
        <div class="conteiner-ponto">
            <div class="alinhamento-bater-ponto">
                <span class="clock"></span>

                <div class="ponto-title">
                    <h4>Digite sua senha:</h4>
                </div>
                <form action="../php/baterponto.php" method="POST">
                    <div class="input-ponto">
                        <input type="password" id="password-ponto" name="senha">
                        <button class="imgponto" type="submit"><img src="../imagens/icons/right-arrow.svg"
                                alt=""></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/ponto.js">
    </script>
    
</body>

</html>