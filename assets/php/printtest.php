<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Imprime Cartoes</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>         
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script language="Javascript">
document.addEventListener('keypress', function(e){
  if(e.which == 13){
    impCards();
  }
}, false);
function impCards()
{
	//Obtem o valor do elemento textfield e armazena na variável "valor"
	var nome = document.getElementById('id1').value;
	var rg = document.getElementById('id2').value;	
	//Imprimir	
	//novo
	var win = window.open();
	//Para imprimir na página	
	win.document.write('<html>');
	win.document.write('<head>');
	win.document.write('<title>Imprimir</title>');
	win.document.write('<style type="text/css">@page{size:portrait;margin:0;}.corpo{margin-top:280px;margin-left:10px;font-size:14px;}p{margin:0;}</style>');
	win.document.write('</head>');
	win.document.write('<body>');	
	win.document.write('<div class="corpo">');  
	win.document.write('<p>'+nome+'</p>'); 
	win.document.write('<p>'+rg+'</p>');
	win.document.write('</div>');  
	win.document.write('</body>');
	win.document.write('</html>');
	win.print(); 
	win.close();
	history.go(0); 
}
</script>
</head>
<body>
<div class="container">
    <div class="col-md-6">
        <div class="configdiv">
		<div class="text-center">
			<h1> Imprimir Cartoes </h1> 
			</br/>
			<span class="input-group-addon" id="basic-addon1">Preencha os campos</span>
			<input id="id1" type="text" class="form-control" value="aaaaaaaaaaaaaaaaaaaaaaaaa" placeholder="Nome" aria-describedby="basic-addon1">
			<input id="id2" type="text" class="form-control" value="aaaaaaaaaaaaaaaa" placeholder="Rg" aria-describedby="basic-addon1">
			<div class="input-group">
  				
				<span class="input-group-addon" id="basic-addon1">Quant.</span>
				<select class"selectpicker" class="btn btn-info">
 					<option value="valor1">1</option> 
  					<option value="valor2">2</option>
  					<option value="valor3">3</option>
				</select> 
			</div>
	
			</br>
			<input class="btn btn-dark" id="button" name="button" type="button" onClick="impCards()" value="Imprimir" />    
		</div>    
        </div>
    </div>
</div>
</body>
</html>
    