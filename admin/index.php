<?php

    include "./partes/header.php"

?>
  
  <body>
    <div class="signin-wrapper">
  <div class="signin-box">
    <h2 class="slim-logo"><a href="../">SGMDG<span>.</span></a></h2>
    <h2 class="signin-title-primary">¡Bienvenido de nuevo!</h2>
    <h3 class="signin-title-secondary">Inicia sesión para continuar.</h3>
    <form action="./php/login.php" method="post" id="formulario" >
        <div class="form-group">
          <input type="text" name="user" class="form-control" id="user" placeholder="Usuario">
        </div>
        <div class="form-group mg-b-50">
          <input type="password" name="pass" autocomplete="off" class="form-control" id="pass" placeholder="Contraseña">
        </div>
        <?php 
				
			if (isset($_GET['error'])) {
				echo '<fieldset  id="error1">'.$_GET['error'].'</fieldset>';
				
				# code...
			}
		 ?>
        <fieldset id="error">
				
					Error
		</fieldset>
        <input class="btn btn-success btn-block" type="submit" id="aceptar" name="aceptar_acción" value="Ingresar"></input>

    </form>
    
  </div>
</div>
  

  </body>
</html>

