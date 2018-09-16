<?php
session_start();
 if(isset($_SESSION['usuario'])){
    
    print_r($_SESSION['usuario']);
    print_r($_SESSION['Nombres'])
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

    
  
      
    <title>Cableado Estructurado</title>

    
  </head>
  <body>





      <!-- Navbar content =========================================================================-->
       <nav class="navbar navbar-dark bg-success sticky-top">

       <div class="d-flex justify-content-start">
           <a class="navbar-brand">
            <img  class="profile-img-card" src="images/cuenta.png" width="30" height="30" />
           <span class="navbar-brand"> Mi cuenta</span>
           </a>

       </div>
           <span class="navbar-brand">Servicios</span>
       </nav>
       <!-- FIN-Navbar content =====================================================================-->
       
       <br>
       <div class="container">
          <ul class="tabs">
              <li id="cableado"><a href="#tab1"><span class="fa fa-sitemap"></span><span class="tab-text"><br>Cableado estructurado</span></a></li>
              
            </ul>
        
            <div class="secciones">
              <article id="tab1">
                <h4>Cableado estructurado</h4>

                
                <form action="php/regCableado.php" class="formulario" method="post" enctype="multipart/form-data" id="insertar-foto">
                  <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">No de puntos</div>
                       </div>
                       <input type="text"  class="form-control" name="cant_puntos" id=""  placeholder="Cantidad de puntos">
                   </div>
 
                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Categoria</div>
                       </div>
                       <select class="form-control" name="categoria" type="text" placeholder="">
                            <option>5-E</option>
                          <option>6</option>
                          <option>6-A</option>
                        </select>
                   </div>
                   
                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Marca</div>
                       </div>
                       <input type="text" class="form-control" name="marca" id="" placeholder="Marca">
                   </div>
 
                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Entrada de facilidades</div>
                       </div>
                          <select class="form-control" name="ent_facilidades" type="text" placeholder="">
                            <option>Si</option>
                          <option>No</option>
                        </select>
                   </div>
 
                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Instalacion de gabinete</div>
                       </div>
                          <select class="form-control" name="inst_gabinete" type="text" placeholder="">
                            <option>Si</option>
                          <option>No</option>
                        </select>
                   </div>

                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Certificacion</div>
                       </div>
                          <select class="form-control" name="certificacion" type="text" placeholder="">
                            <option>Si</option>
                          <option>No</option>
                        </select>
                   </div>  
                      <div class="card-body d-flex justify-content-between align-items-center">
                          
                          <a href="diagrama/diagrama.html" class="btn btn-secondary" id="">
                            <i class="fas fa-pencil-alt"></i> 
                            Dibujar plano
                          </a>
                                                                    
                          <input type="file" name="file_img[]" accept="image/*" multiple="multiple" capture="camera" style="display: none;" id="camera">
                          
                                <input type="button" name="" class="btn btn-primary" id="camara" value="Fotografias" onclick="document.getElementById('camera').click();">
                      </div>
                    
                                            
                  <div id="preview"></div>
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