$('#toggle-one').bootstrapToggle('on');

var input = document.querySelector('#clear');
var textarea = document.querySelector('#allData');
input.addEventListener('click', function () {
textarea.value = '';
}, false);