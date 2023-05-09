const API_URL = 'https://api.thecatapi.com/v1/images/search?limit=3&api_key=live_pBEBQcBZwgUE0JmGQA863mCQT1YVISgKQifhFa8iY6zENJv3SguQsa81CEP3vGkc';
const DATA_API_KEY = 'live_pBEBQcBZwgUE0JmGQA863mCQT1YVISgKQifhFa8iY6zENJv3SguQsa81CEP3vGkc';
const API_URL_Favourites = 'https://api.thecatapi.com/v1/favourites?limit=100&api_key=' + DATA_API_KEY;
const API_URL_Delete_Favourites = 'https://api.thecatapi.com/v1/favourites/';
const errorApi = document.getElementById("errorStatus");
async function loadFavouriteCats() {
    console.log("Gatos Favoritos:");
    try {
        const respuesta = await fetch(API_URL_Favourites);
        //console.log(respuesta);      
        //const datos = await respuesta.json(); 
        //console.log(datos.message);     
        if (!respuesta.ok) {
            if (respuesta.status !== 200) {
                errorApi.innerHTML = "hubo un error: " + respuesta.status; // reemplaza la sintaxis HTML del elemento por la nueva.          
            }
        } else {
            const data = await respuesta.json();
            console.log(data);
            /*const img2 = document.getElementById('img2');
            const img3 = document.getElementById('img3');            
            //img2.src = data[0].url;
            img3.src = data[1].image.url;*/
            const row = document.getElementById('gatosFavoritos');
            row.innerHTML = ""; //InnerHTML es una propiedad que nos permite leer un dato o asignarlo al contenido
            data.forEach(gato => {
                //nodos de HTML
                //const row = document.getElementById('gatosFavoritos');
                var col = document.createElement('div');
                var cardShadow = document.createElement('div');
                const img = document.createElement('img');
                const btn = document.createElement('button');
                const btnTexto = document.createTextNode('Eliminar gato');
                img.src = gato.image.url;
                img.style.width = '100%';//antes-->img.width
                btn.appendChild(btnTexto);
                btn.onclick = () => borrarGatoFavorito(gato.id); //gato.image_id (no usar)
                col.appendChild(cardShadow);
                cardShadow.appendChild(img);
                cardShadow.appendChild(btn);
                row.appendChild(col);
                col.classList.add("col");
                btn.classList.add("btn", 'btn-sm', 'btn-outline-secondary');
                cardShadow.classList.add("card", "shadow-sm");
                //gato.image.url;
            });
        }
    } catch (e) {
        console.error(e);
    }
}
async function cargarUltimosGatosFavoritos() {
    console.log("Ultimos gatos Favoritos agregados ...");
    const respuesta = await fetch(API_URL_Favourites);
    if (!respuesta.ok) {
        if (respuesta.status !== 200) {
            errorApi.innerHTML = "hubo un error: " + respuesta.status; // reemplaza la sintaxis HTML del elemento por la nueva.          
        }
    } else {
        const data = await respuesta.json();        
        var j=7;
        for (var i = data.length - 1; i >= (data.length - 3); i--) {
            //console.log( data[i].image.url);
            var img = document.getElementById('img'+j);
            img.src = data[i].image.url
            j++;
        }
    }
}
async function cargarGatos(){
    try {
        const respuesta = await fetch(API_URL);
        if (respuesta.status !== 200) {
            errorApi.innerHTML = "hubo un error: " + respuesta.status; // reemplaza la sintaxis HTML del elemento por la nueva.          
        } else {
            const datos = await respuesta.json();
            console.log("Gatos cargados: ");
            console.log(datos);
            const img1 = document.getElementById('img1');
            const img2 = document.getElementById('img2');
            const img3 = document.getElementById('img3');
            const img4 = document.getElementById('img4');
            const img5 = document.getElementById('img5');
            const img6 = document.getElementById('img6');
            const btn1 = document.getElementById('btn1');
            const btn2 = document.getElementById('btn2');
            const btn3 = document.getElementById('btn3');
            img1.src = datos[0].url;
            img2.src = datos[1].url;
            img3.src = datos[2].url;
            img4.src = datos[0].url;
            img5.src = datos[1].url;
            img6.src = datos[2].url;
            btn1.onclick = () => guardarGatoFavorito(datos[0].id);
            btn2.onclick = function() {
                guardarGatoFavorito(datos[1].id);
            };
            btn3.onclick = function() {
                guardarGatoFavorito(datos[2].id);
            };
        }
        //img3.src = datos[1].url;   
    } catch (e) {
        console.error(e);
    }
    //document.getElementById("container").innerHTML = JSON.parse(JSON.stringify(datos[0]));
} //fin cargarGatos
//async function guardarGatoFavorito() 
async function guardarGatoFavorito(idGato) {
    var rawBody = JSON.stringify({
        "image_id": "" + idGato
    });
    const response = await fetch(API_URL_Favourites, {
        method: 'POST',
        headers: {
            "content-type": "application/json"
        }, //lenguaje comun en el que vamos hablar
        body: rawBody
    });
    console.log(response);
    const favourites = await response.json();
    console.log(favourites);
    if (response.status !== 200) {
        errorApi.innerHTML = "hubo un error: " + respuesta.status; // reemplaza la sintaxis HTML del elemento por la nueva.          
    } else {
        console.log("gato guardado!");
        cargarUltimosGatosFavoritos();
        cargarGatos();
    }
}
async function borrarGatoFavorito(idGato) {
   
    var requestOptions = {
        method: 'DELETE',
    };
    const ruta = API_URL_Delete_Favourites + idGato + '?api_key=' + DATA_API_KEY;
    const response = await fetch(ruta, requestOptions);
    if (response.status !== 200) {
        errorApi.innerHTML = "hubo un error: " + response.status; // reemplaza la sintaxis HTML del elemento por la nueva.          
    } else {
        console.log("gato eliminado!");
        loadFavouriteCats(); //primero aqui
    }
}
//console.log(window.location.pathname);
var cadena = ""+window.location.pathname;
var palabra = "aletorios";

var index = cadena.indexOf(palabra);

if(index >= 0) {
    cargarGatos();
    cargarUltimosGatosFavoritos();
} else {//la palabra no existe dentro de la cadena
   loadFavouriteCats();
}

