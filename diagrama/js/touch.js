var elementoTouch= document.getElementById("floorplanner-canvas");

//posteriormente asignamos el manejador de eventos lo cual
// se hace de manera convencional.
elementoTouch.addEventListener('touchstart', function(event){
    //Comprobamos si hay varios eventos del mismo tipo
    if (event.targetTouches.length == 1) { 
    var touch = event.targetTouches[0]; 
    // con esto solo se procesa UN evento touch
    console.log(" se ha producido un touchstart en las siguientes cordenas: X " + touch.pageX + " en Y " + touch.pageY);
    }
    
    }, false);