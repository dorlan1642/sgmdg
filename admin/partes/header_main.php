<?php 
session_start();
if (isset($_SESSION['Id_user']) && isset($_SESSION['Name']) && isset($_SESSION['User'])) {
	$id_us= $_SESSION['Id_user'];
	$nombre= $_SESSION['Name'];
	$user= $_SESSION['User'];


}else{	
	header("Location:./index.php?error=Favor de iniciar sesion");
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta lang='es'> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin &#8212; Panel de Administración</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.css" rel="stylesheet">
    <link rel="stylesheet" media="all" type="text/css" href="https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
    <script src="./js/plugins.js"></script>
    <script src="./js/scripts.js"></script>
  </head>
  <body>
    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="../index.php">Sociedad de Gemas y Mineras Distrito Galeana.<span></span></a></h2>
        </div>
        <div class="slim-header-right">
          <div class="dropdown dropdown-c">
            <a href="#" class="logged-user" data-toggle="dropdown">
              <span class="logged-user-icon"><i class="icon ion-person"></i></span>
              <span><?php echo $nombre ?></span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class="nav">
                
                <a href="./php/logout.php" class="nav-link"><i class="icon ion-forward"></i> Salir</a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slim-navbar">
      <div class="container">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./">
              <i class="icon ion-ios-home-outline"></i>
              <span>Dashboard</span>
            </a>
          </li>
         <li class="nav-item with-sub">
              <a href="#" class="nav-link" data-toggle="dropdown">
                <i class="icon ion-ios-filing-outline"></i>
                <span>Administración</span>
              </a>
              <div class="sub-item">
                <ul>
                  <li><a href="members.php">Miembros</a></li>
                  <li><a href="news.php">Noticias</a></li>
                  <li><a href="events.php">Eventos</a></li>
                </ul>
              </div>
          </li>

         
         
        </ul>
      </div>
    </div>




