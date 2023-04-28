<html lang="es">
    <head>
        <section class="container">
            <!--button type="button" class="random-cat-button">Gato</button-->
            <button type="button" onclick="cargarGatos()" class="random-cat-button"> Recargar (onclick-html)</button>
        </section>
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h1  class="position-relative py-2 px-4 text-bg-dark border border-dark rounded-pill" > Random Cats </h1>
            </div>
        </div>
        <div id="error-mensaje" class="alert alert-danger alert-dismissible fade show " role="alert">
            <strong id="errorStatus"> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-6 col-sm-4"><img id="img1"width="250" alt="Cat random Picture" class="image"></div>
                <button id="btn1" type="button"  class="btn btn-primary">Me gusta</button>
                <!--button id="btn1" type="button" onclick="guardarGatoFavorito()" class="btn btn-primary">Me gusta</button-->
                <!-- Force next columns to break to new line at md breakpoint and up -->
                <div class="w-100 d-none d-md-block"></div>
                <div class="col-6 col-sm-4"><img id="img2"width="250" alt="Cat random Picture" class="image"></div>
                <button id="btn2" type="button"  class="btn btn-primary">Me gusta</button>
                <!-- Force next columns to break to new line at md breakpoint and up -->
                <div class="w-100 d-none d-md-block"></div>
                <div class="col-6 col-sm-4"><img id="img3" width="250" alt="Cat random Picture" class="image"></div>
                <button id="btn3" type="button"  class="btn btn-primary">Me gusta</button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h1  class="position-relative py-2 px-4 text-bg-dark border border-dark rounded-pill" > Gatos Favoritos </h1>
            </div>
        </div>
        <div class="container text-center">
            <div id="gatosFavoritos" class="row">
                <!--div  class="col-6 col-sm-4">.col-6 .col-sm-4</div-->
            </div>
        </div>
        <script src="../js/gatitos.js?v6"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </body>
</html>