<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($associados as $associado)
        <h1>Associado: {{ $associado->nome }}</h1>    
        <h1>Associado: {{ $associado->ocupacao }}</h1>
    @endforeach    


</body>
</html>