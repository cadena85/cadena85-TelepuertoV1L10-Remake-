console.log("hola");

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

  /*
fetch('https://pokeapi.co/api/v2/pokemon')
      .then(response => response.json())
      .then(json => console.log(json));
  */