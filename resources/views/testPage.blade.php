<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible"content="IE=edge">
        <link rel="stylesheet" href="../css/gatos.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?familyPacifico&family=Square+Peg&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Random Cats with API REST</title>
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h1  class="position-relative py-2 px-4 text-bg-dark border border-dark rounded-pill" > Random Cats & Dogs </h1>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-6 col-sm-4"><img id="img1" width="250" alt="Cat random Picture" class="image"></div>
                <div class="col-6 col-sm-4"><img id="img2"width="250" alt="Cat random Picture" class="image"></div>
                <!-- Force next columns to break to new line at md breakpoint and up -->
                <div class="w-100 d-none d-md-block"></div>
                <div class="col-6 col-sm-4"><img id="img3" width="250" alt="Cat random Picture" class="image"></div>
                <div class="col-6 col-sm-4"><img id="img4" width="250" alt="Cat random Picture" class="image"></div>
            </div>
        </div>
        <section class="container">
            <button type="button" class="random-cat-button">Gato</button>
            <button type="button" onclick="mydog()" class="random-cat-button"> Perro (onclick-html)</button>
        </section>
        <script src="../js/gatitos.js?v2"></script>
        <div id="container"></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>