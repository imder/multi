<?php
session_start();
 if(isset($_SESSION['usuario'])){
    
   
  ?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mis_estilos.css">
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="css/all.css">

    
  
      
    <title>Iluminacion</title>

    
  </head>
  <body>





      <!-- Navbar content =========================================================================-->
       <nav class="navbar navbar-dark bg-success sticky-top">

       <div class="d-flex justify-content-start">
           <a class="navbar-brand">
            <img  class="profile-img-card" src="images/cuenta.png" width="30" height="30" />
            <?php echo "<small style='color: #ffffff;'>".$_SESSION['Nombres']."</small>" ;?>
           </a>

       </div>
           <span class="navbar-brand">Servicios</span>
       </nav>
       <!-- FIN-Navbar content =====================================================================-->
       
       <br>
       <div class="container">
          <ul class="tabs">
              
              <li id="iluminacion"><a href="#tab3"><span class="fas fa-code-branch"></span><span class="tab-text"><br>Fibra <br>optica</span></a></li>
              
            </ul>
        
            <div class="secciones">
              



              <article id="tab3">
                <h4>Iluminacion</h4>
                <form action="php/regIluminacion.php" class="formulario" method="post" enctype="multipart/form-data" id="insertar-foto">

                  <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Cantidad de luminarias</div>
                       </div>
                       <input type="text"  class="form-control" name="i_cantLumi" id=""  placeholder="Cantidad luminarias">
                  </div>
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Cantidad de Interruptores</div>
                      </div>
                      <input type="text"  class="form-control" name="i_cantInte" id=""  placeholder="Cantidad de Interruptores">
                 </div>
              
               <div class="card-body d-flex justify-content-between align-items-center">
                          
                          <a href="dibujo.html" class="btn btn-secondary" id="">
                            <i class="fas fa-pencil-alt"></i> 
                            Dibujar plano
                          </a>
                                                                    
                          <input type="file" name="file_img[]" accept="image/*" multiple="multiple" capture="camera" style="display: none;" id="camera">
                          
                                <input type="button" name="" class="btn btn-primary" id="camara" value="Fotografias" onclick="document.getElementById('camera').click();">
                </div>

                <button class="btn btn-warning btn-block" type="submit">
                    Guardar Relevamiento
                </button> 
   
                   
           </form>

              </article>
              

      </div>

      </div>
    
     




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS-->
    
    <script src="js/jquery.1.js"></script>
    <!-- <script src="js/fotografias.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/panel.js"></script>
  </body>

  <script>
  $(document).ready(function(){
    $("#camera").on("change",function(){
       //alert("a");
		
		$.ajax({
        	url: "php/regFotografia.php",   	// URL a la que se envía la solicitud
			type: "POST",      				// Tipo de solicitud que se enviará, llamado como método 
			data:  new FormData($("#insertar-foto")[0]), 		// Datos enviados al servidor 
			contentType: false,       		// El tipo de contenido utilizado al enviar datos al servidor. El valor predeterminado es: "application / x-www-form-urlencoded"
    	    cache: false,					// Para no poder solicitar que las páginas se almacenen en caché
			processData:false,  			// Para enviar DOMDocument o archivo de datos no procesados, se establece en falso (es decir, los datos no deben estar en forma de cadena)
			success: function(data)  		// Una función a ser llamada si la solicitud tiene éxito
		    {
				console.log('se guardo exitosamente');
		    }	        
	   });
    });
});

   
  </script>
  
</html>
<?php
}
else{

 header("Location: ./index.html"); 
}


?>