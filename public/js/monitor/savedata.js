var popup;
/*function saveTextAsFile() {
  var textToWrite = document.getElementById('allData').innerHTML;
  var textFileAsBlob = new Blob([ textToWrite ], { type: 'text/plain' });
  var fileNameToSaveAs = "data.txt";
  var downloadLink = document.createElement("a");
  downloadLink.download = fileNameToSaveAs;
  downloadLink.innerHTML = "Download File";
  if (window.webkitURL != null) {
  // Chrome allows the link to be clicked without actually adding it to the DOM.
  downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
  } else {
  // Firefox requires the link to be added to the DOM before it can be clicked.
  downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
  downloadLink.onclick = destroyClickedElement;
  downloadLink.style.display = "none";
  document.body.appendChild(downloadLink);
  }
  downloadLink.click();
}
var button = document.getElementById('save');
button.addEventListener('click', saveTextAsFile);
function destroyClickedElement(event) {
  // remove the link from the DOM
  document.body.removeChild(event.target);
}
*/
// on click on button open generated popup
$('#save').on('click',function(e){
  e.preventDefault();
  popup.mPopup('open');
  $('body').css('overflow', 'hidden');
});

$('#sample1').on('mPopup:close' , function (e) {
$('body').css('overflow', 'auto');
});

/*
$('#save').on('click',function(e){
$('#sample1').mPopup('close');
$( ".contenido" ).children().text("");
$('#btn-close-ok').prop('disabled', true);
$("#title").text("Rastreando...");
});
*/

$(document).ready(function(){
    // generate popup
    popup = $('.mPopup').mPopup({
        closeOnOverlayClick : true
    });

    // open generated popup
    //popup.mPopup('open');
});

function Oculta() {

$('#sample1').mPopup('close');
}
window.onload=Oculta;


