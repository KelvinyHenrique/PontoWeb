<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intervalos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bodyintervalos">

    <div class="conteiner">



        <form method="POST" class="form-intervalos" action="../php/ponto.php">
            <div class="body-intervalo">
                        
                     

                        <div class="botao-intervalos">
                               <button class="intervalo-box" id="entrada"  type="submit" value="Entrada" name="btnvalue">
                            <div class="intervalo-titulo">Entrada</div>
                            <div class="intervalo-icon"><img src="../imagens/icons/door.svg" alt=""></div>
                        </button>
            
                        <button class="intervalo-box" id="pausa"  type="submit" value="Pausa" name="btnvalue">
                            <div class="intervalo-titulo">Pausa</div>
                            <div class="intervalo-icon"><img src="../imagens/icons/dinner.svg" alt=""></div>
                        </button>
                        </div>
            
                        <div class="botao-intervalos">
                               <button class="intervalo-box" id="retorno"  type="submit" value="Retorno" name="btnvalue">
                            <div class="intervalo-titulo">Retorno</div>
                            <div class="intervalo-icon"><img src="../imagens/icons/retorno.svg" alt=""></div>
                        </button>
            
                        <button class="intervalo-box" id="saida" type="submit" value="Saida" name="btnvalue">
                            <div class="intervalo-titulo">Saida</div>
                            <div class="intervalo-icon"><img src="../imagens/icons/saida.svg" alt=""></div>
                        </button> 
                        </div>
                     

              <!--   <input class="intervalo-box" id="entrada" type='submit' name='getValue' value='Entrada' />
                <input class="intervalo-box" id="pausa" type="submit" name="getValue" value="Pausa" />
                <input  class="intervalo-box" id="retorno" type="submit" name="getValue" value="Retorno" />
                <input class="intervalo-box" id="saida" type="submit" name="getValue" value="Saida" /> -->
            </div>
        </form>
    


    </div>









</body>

</html>