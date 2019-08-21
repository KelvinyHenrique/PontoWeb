<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banco de Horas</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tabelahoras.css">
</head>


<body>
    <div class="conteiner">
        <div class="bancodehoras">
            <div class="divbodyhoras">
                <div class="pesquisatopo">
                    <form method="post" class="formulariobancodehoras">
                        <div class="box2019-pesquisa">
                            <div class="infostopobar">Data inicial:<input type="date" name="datainicial"></div>
                            <div class="infostopobar">Data final:<input type="date" name="datafinal"></div>
                            <div class="infostopobar">Empresa:
                                <select id="lojapesquisa" name="lojapesquisa">
                                    <option value="1">LOJA 1</option>
                                    <option value="2">LOJA 2</option>
                                    <option value="3">LOJA 3</option>
                                </select>
                            </div>
                            <div class="infostopobar2">Funcionario: <input type="text" name="pesquisanomefuncionario">
                            </div>
                        </div>
                        <div class="botaopesquisatopo"><input type="submit" value="Pesquisar" /></div>
                    </form>



                </div>
                <div class="quadradoshoras">
                    <div class="conteiner">
                      <div class="resumododia">
                    <div> 
                        <p> Resumo do dia <?php echo date('d/m/y'); ?></p>
                    </div>
                    
                </div>
                  
                       
                    </div>
                    <div class="informacoeshoras">
                        <div class="horasextras">
                            <p>+24</p>
                            <p>EXTRAS</p>
                        </div>
                        <div class="totalhoras">
                            <p>+820H</p>
                            <p>TOTAL</p>
                        </div>
                        <div class="totalfaltas">
                            <p>10</p>
                            <p>FALTAS</p>
                        </div>
                        <div class="totalatestados">
                            <p>1</p>
                            <p>ATESTADOS</p>
                        </div>
                    </div>

                </div>

                 <?php if(isset($_POST['pesquisanomefuncionario']) && isset($_POST['datafinal']) && empty($_POST['datainicial']) == false && empty($_POST['datafinal']) == false) {
   

require "../php/config.php";
$nomefuncionariopesquisa = $_POST['pesquisanomefuncionario'];
$datainicial = $_POST['datainicial'];
$datafinal = $_POST['datafinal'];
$loja = $_POST['lojapesquisa'];

// PEGA HORA ORGANIZA PARA FICAR TUDO DE ACORDO COM O QUE PE SALVO NO BANCO DE DADOS
$datainicial = explode("-", $datainicial);
list($ano, $mes, $dia) = $datainicial; 
$datainicial = "$ano-$mes-$dia";

$datafinal = explode("-", $datafinal);
list($ano, $mes, $dia) = $datafinal; 
$datafinal = "$ano-$mes-$dia";




$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE nome LIKE :nomefuncionariopesquisa AND empresa = :loja ORDER BY id");
$sql->bindValue(":nomefuncionariopesquisa", "%$nomefuncionariopesquisa%", PDO::PARAM_STR);
$sql->bindValue(":loja", $loja);
$sql->execute();

if($sql->rowCount() > 0) {
    ?>
      <div class="infonomehoras">
                    <div class="tabelabancohoras">
                        <table cellspacing="0" cellpadding="0" class="tablehorasbody">
                            <tr>
                                <th>NOME</th>
                                <th>DATA</th>
                                <th>INICIO</th>
                                <th>PAUSA</th>
                                <th>RETORNO</th>
                                <th>SAIDA</th>
                                <th>TOTAL</th>
                                <th>EXTRA</th>
                            </tr>
    
    
    <?php
	foreach ($dados = $sql->fetchAll() as $resultadofuncionario) {
			$idpesquisafuncionario = $resultadofuncionario['id'];
    $sql = $pdo->prepare("SELECT * FROM ponto WHERE data BETWEEN :datainicial AND :datafinal AND funcionario = :idpesquisafuncionario");
    $sql->bindValue(":idpesquisafuncionario", $idpesquisafuncionario);
    $sql->bindValue(":datainicial", $datainicial);
    $sql->bindValue(":datafinal", $datafinal);
    $sql->execute();
    
        foreach ($registrosdeponto = $sql->fetchAll() as $resultadopesquisadata) {
        
             $dadosdata = $resultadopesquisadata['data'];
       $dadosentrada = $resultadopesquisadata['Entrada'];
       $dadospausa = $resultadopesquisadata['Pausa'];  
       $dadosretorno = $resultadopesquisadata['Retorno'];
       $dadosaida = $resultadopesquisadata['Saida'];
      ?>
 
       <tr>
       <td><?php echo $resultadofuncionario['nome']; ?></td>
       <td><?php  echo $dadosdata; ?></td>
       <td><?php  echo $dadosentrada; ?></td>
       <td><?php  echo $dadospausa; ?></td>
       <td><?php  echo $dadosretorno; ?></td>
       <td><?php  echo $dadospausa; ?></td>

<?php 

$horaInicial  = strtotime($dadosentrada);
$horaFinal    = strtotime($dadosaida);
$intervalo    = strtotime($dadosretorno);
$horaAuxuliar = strtotime($dadospausa);
/*
     Bom...agora é só dividir os valores...e você terá o total de segundos trabalhados
 */
$totalSegundos = ($horaFinal - $horaInicial);

/* Observe que...já que estamos falando de segundos e você quer 
     saber o total de horas trabalhas...então...você terá que dividir pela quantidade de segundos existente em 1 hora...que no caso é 3600 segundos ok*/
$totalHora = $totalSegundos / 3600; 

/*E não podemos esquecer a hora de intervalo né...observe que criei uma hora auxiliar para que possa ser interagaida com ele beleza...*/
$segundosIntervalo = $intervalo - $horaAuxuliar;
$horaIntervalo = $segundosIntervalo /3600;

/* E finalmente para que você saiba realmente quantas horas o fulano trabalhou...de acordo com as horas inseridas pelo usuario é claro...*/

$horasTrabalhadas = $totalHora - $horaIntervalo;

 $segundosTotal = $totalSegundos - $segundosIntervalo;
 
 function converterHora($total_segundos){
           
    $hora = sprintf("%02s",floor($total_segundos / (60*60)));
    $total_segundos = ($total_segundos % (60*60));
    
    $minuto = sprintf("%02s",floor ($total_segundos / 60 ));
    $total_segundos = ($total_segundos % 60);
    
    $hora_minuto = $hora.":".$minuto;
    return $hora_minuto;
}
 
 /*E para que tudo saia num formato bunitinhu...te messa função aí para converter a parada ok...*/
$hora = converterHora($segundosTotal);
$horasextra = 36000 - $totalSegundos; 


?>

       <td><?php echo $hora; ?></td>
       <td><?php echo $horasextra;?></td>
   </tr>
    <?php
    }}}} 

?>
                         

                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>