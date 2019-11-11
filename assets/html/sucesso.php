<?php
//PEGA DATA ATUAL 

date_default_timezone_set('America/Sao_Paulo');
$data = date("d/m/Y");
  
$data = explode("/", $data);
   
list($dia, $mes, $ano) = $data;
   
$data = "$ano-$mes-$dia";
 //echo $data;

// FIM DATA

//PEGA HORA ATUAL

$horaatual = date('h:i:s');
$horaatual = explode(":", $horaatual);
list($hora, $minuto, $segundos) = $horaatual;
$horaatual = "$hora-$minuto-$segundos";
?>


<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Ponto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="background-sucesso">

    <div class="conteiner">
      
            <div class="body-contagem-ponto">
  <div class="box-registro-principal">

                <div class="titulo-sucesso">
                    <h1>Registro de Ponto realizado com sucesso</h1>
                </div>

                <div class="box-registro">
                    <div class="box-contagem-ponto">
                        <div class="box-data dia">
                            <div><?php echo $dia;?></div>
                            <div>Dia</div>
                        </div>

                        <div class="box-data mes">
                            <div><?php echo $mes;?></div>
                            <div>Mês</div>
                        </div>

                        <div class="box-data ano">
                            <div><?php echo $ano;?></div>
                            <div>Ano</div>
                        </div>

                        <div class="box-data hora">
                            <div><?php echo $hora;?></div>
                            <div>Horas</div>
                        </div>

                        <div class="box-data minuto">
                            <div><?php echo $minuto;?></div>
                            <div>Minutos</div>
                        </div>

                        <div class="box-data minuto">
                            <div><?php echo $segundos;?></div>
                            <div>Segundos</div>
                        </div>
                    </div>
                </div>
                <div class="box-btn-intervalos">
                      <div class="botao-sair">
                    <button class="btn"> <a href="ponto.php">Voltar</a></button>
                </div>

                <div class="botao-voltar">
                    <button class="btn bg-red"> <a href="../../index.html">Sair</a></button>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
        setTimeout(function() {
            window.location.href = "ponto.php";
        }, 5000);
    </script>
</html>