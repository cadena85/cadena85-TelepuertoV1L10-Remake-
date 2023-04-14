console.log("hola");
const URL = 'https://api.thecatapi.com/v1/images/search';

async function myCat () {
    const res = await fetch(URL);
    const data = await res.json();
    const img = document.querySelector('img');
    img.src = data[0].url;
}

const myButton = document.querySelector("button");
myButton.onclick = myCat;

const API_URL = 'https://api.thecatapi.com/v1/images/search';
async function reload(){
  try{
    const respuesta = await fetch(API_URL);
    const datos = await respuesta.json();
    const img = document.querySelector('img');
    img.src = datos[0].url;  
  }catch (e){
    console.error(e);    
  }  
  //document.getElementById("container").innerHTML = JSON.parse(JSON.stringify(datos[0]));
}
reload();
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