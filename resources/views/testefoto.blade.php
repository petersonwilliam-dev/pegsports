<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="/uploadfoto" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo[]" id="photo" multiple>
    <input type="submit" value="enviar">
</form>

</body>
</html>