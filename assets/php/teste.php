<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>



<body>
<input type="checkbox" id="ok" />
<input type="checkbox" id="nok" />
<input type="checkbox" id="na" />

</body>
<script>
var inputs = $('[type="checkbox"]'); // colocar os inputs em cache
inputs.on('click', function() { // juntar auscultador de evento
    inputs.get().forEach(function(el) { // iterar com a array nativa
        el.checked = el == this && this.checked; // marcar ou desmarcar o elemento iterado
    }, this);
});
</script>
</html>