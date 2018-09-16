  // jQuery
  $(document).ready(function(){ 
       
    $('#alternar-panel-oculto').toggle( 
   
        /* 
            Primer click.
            Función que descubre un panel oculto
            y cambia el texto del botón.
        */
        function(e){ 
            $('#panel-oculto').slideDown();
            $(this).text('Cerrar el panel');
            e.preventDefault();
        }, // Separamos las dos funciones con una coma
     
        /* 
            Segundo click.
            Función que oculta el panel
            y vuelve a cambiar el texto del botón.
        */
        function(e){ 
            $('#panel-oculto').slideUp();
            $(this).text('Mostrar el panel oculto');
            e.preventDefault();
        }
   
    );
   
   });