$('#root').draggable(
    {
        drag: function(){
            var offset = $(this).offset();
            var xPos = offset.left;
            var yPos = offset.top;
            $('#posX').text('x: ' + xPos);
            $('#posY').text('y: ' + yPos);
        }
    });

$( window ).on( "load", function() {
    $("#side-content").css({'height':($(".fullWidth.flex").height()+'px')});
});