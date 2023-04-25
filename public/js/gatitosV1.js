console.log("consumiendo API-REST");

const URL = 'https://api.thedogapi.com/v1/images/search';
async function mydog () {
    const res = await fetch(URL);
    const data = await res.json();
    const img = document.getElementById('img1');
    img.src = data[0].url;
}

const myButton = document.querySelector("button");
myButton.onclick = myCat;

const API_URL = 'https://api.thecatapi.com/v1/images/search?limit=2&api_key=live_pBEBQcBZwgUE0JmGQA863mCQT1YVISgKQifhFa8iY6zENJv3SguQsa81CEP3vGkc';
async function myCat(){
  try{
    const respuesta = await fetch(API_URL);
    const datos = await respuesta.json();
    //console.log(datos);
    const img2 = document.getElementById('img2');
    const img3 = document.getElementById('img3');    
    img2.src = datos[1].url;  
    img3.src = datos[2].url; 
  }catch (e){
    console.error(e);    
  }  
  //document.getElementById("container").innerHTML = JSON.parse(JSON.stringify(datos[0]));
}
myCat();

/*
async function myCat () {
    const res = await fetch(URL);
    const data = await res.json();
    const img = document.querySelector('img');
    img.src = data[0].url;
}

*/

/*
const URL = "https://api.thecatapi.com/v1/images/search";

fetch(URL)
  .then(response => response.json())
  .then(data => {
    const img = document.querySelector('img');
    img.src = data[0].url;
    document.getElementById("container").innerHTML = JSON.parse(JSON.stringify(data[0]));
    //console.log(data);
  })
  .catch(err => console.log(err));
*/
  /*
fetch('https://pokeapi.co/api/v2/pokemon')
      .then(response => response.json())
      .then(json => console.log(json));
  */