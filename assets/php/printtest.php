<?php 



$dadosentrada = $resultadopesquisadata['Entrada'];
$dadospausa = $resultadopesquisadata['Pausa'];  
$dadosretorno = $resultadopesquisadata['Retorno'];
$dadosaida = $resultadopesquisadata['Saida'];

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

$horasextras = $horasTrabalhadas - 8;

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

?>