/*
Por lo general, prefiero la solución más general de vincularlo a los eventos 
globales ajaxStart y ajaxStop, de esa manera se muestra para todos los eventos ajax:
$(document).ajaxStart(function(){ });*/
$(document).ajaxStop(function(){ 
       $('.spinner').fadeOut(555);
 });
$(document).ready(function(){ 
	var ruta = document.getElementById('path').getAttribute('data-src');	
	
	$(".waiters").sortable({
		connectWith: "ul.waiters",
		revert: true,
		cursor: "move",
		receive: function( event, ui) {
			$(ui.item).hide();
		}
	});
	$("#container1").disableSelection();//es el menu

	//reactivamos el drop para cuando se desea mover elemento al area de trabajo
	$(document).on("mousedown","#container1", function (e) {
		$("#container3").droppable({disabled: false});
	}).on('mouseup mouseleave', function() { 
		//no hagas nada
	});

	//desactivamos el drop para cuando se desea mover la protoboard
	$('#container3').on('dragstart', function(event) { 
		$("#container3").droppable({disabled: true});
	});
	$("#container3").droppable({
		drop: function(event, ui) { //cuando se suelta en el area de trabajo
			$( "#container2" ).addClass( "overlay-closed" );//quito la capa semitransparente
			$('.spinner').show();    			
			$.ajax({
        		url: ruta + "/tablero/partials/grupos.html" ,
        		async: false,   // asynchronous request? (synchronous requests are discouraged...)
        		cache: false,   // with this, you can force the browser to not make cache of the retrieved data
        		dataType: "text",  // jQuery will infer this, but you can set explicitly
        		success: function( data, textStatus, jqXHR ) {
            		var resourceContent = data; // can be a global variabl  e too...
            		document.getElementById('root').innerHTML = resourceContent;// process the content...            		
    			}
    		});//$( "#root" ).load( ruta+ "/tablero/partials/grupos.html" );
		},over: function(event, ui) { //colocar sobre el area de trabajo

			if ($(ui.draggable).attr("id") !== 'root')
				$( "#container2" ).removeClass( "overlay-closed" );			
				//$("#container2" ).css('background', 'grey');
		},out: function(event, ui){ 
			$( "#container2" ).addClass( "overlay-closed" );			
		}
	});

});
