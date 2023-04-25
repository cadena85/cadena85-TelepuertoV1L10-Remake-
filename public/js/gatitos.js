const API_URL = 'https://api.thecatapi.com/v1/images/search?limit=3&api_key=live_pBEBQcBZwgUE0JmGQA863mCQT1YVISgKQifhFa8iY6zENJv3SguQsa81CEP3vGkc';
const DATA_API_KEY = 'live_pBEBQcBZwgUE0JmGQA863mCQT1YVISgKQifhFa8iY6zENJv3SguQsa81CEP3vGkc';
const API_URL_Favourites = 'https://api.thecatapi.com/v1/favourites?limit=3&api_key=' + DATA_API_KEY;
const errorApi = document.getElementById("errorStatus");
async function loadFavouriteCats() {
    //console.log("Favoritos:");
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
            const img2 = document.getElementById('img2');
            const img3 = document.getElementById('img3');            
            //img2.src = data[0].url;
            img3.src = data[1].image.url;
        }
    } catch (e) {
        console.error(e);
    }
}

async function guardarGatoFavorito() {
    var rawBody = JSON.stringify({
        "image_id": "8qg"
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
    }
}

async function myCat(){
  try{
    const respuesta = await fetch(API_URL);
    if (respuesta.status !== 200) {
        errorApi.innerHTML = "hubo un error: " + respuesta.status; // reemplaza la sintaxis HTML del elemento por la nueva.          
    }
    const datos = await respuesta.json();
    console.log("Mis gatos: ");
    console.log(datos);
    const img2 = document.getElementById('img2');
    const img3 = document.getElementById('img3');  
    img2.src = datos[0].url;  
    //img3.src = datos[1].url;   
  }catch (e){
    console.error(e);    
  }  
  //document.getElementById("container").innerHTML = JSON.parse(JSON.stringify(datos[0]));
}

loadFavouriteCats();
myCat();