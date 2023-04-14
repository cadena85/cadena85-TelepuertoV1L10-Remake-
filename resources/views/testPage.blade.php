<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/gatos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?familyPacifico&family=Square+Peg&display=swap" rel="stylesheet">
    <title>Random Cats with API REST</title>
</head>
<body>
    <header>
        <h1>Random Cats</h1>
    </header>
    <section class="container">
        <img width="250" alt="Cat random Picture" class="image">
        <button type="button" class="random-cat-button"> Muestrame un gato!</button>
        <button type="button" onclick="reload()" class="random-cat-button"> Recargar</button>
    </section>    
    <script src="../js/gatitos.js?v1"></script>
    <div id="container"></div>
</body>
</html>