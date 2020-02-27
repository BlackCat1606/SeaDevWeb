<?php
//Démarrer une session
session_start();

$_SESSION['prenom'] = '';
$_SESSION['nom'] = '';
$_SESSION['username'] = '';

?> 


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DZHealth - Connexion </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <!--<form class="form-login" method='post' action="index.html"> -->
		      <form action="login.php" method='post'  class="form-login" > 
		        <h2 class="form-login-heading">Connexion</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Nom d'utilisateur" name ='username' autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Mot de Passe" name='passwd'>
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Mot de Passe oublié?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="login.php" type="submit" name ="submit"><i class="fa fa-lock"></i> Se Connecter</button>
		            <hr>
		            <div class="login-social-link centered">


		            	<!-- SeaDev PHP Code -->
		            <?php
		              if(isset($_POST['submit']))
		              {
			          if (!isset($_POST['username']) OR !isset($_POST['passwd']))
			          {
			          	echo 'Veuillez insérer le nom d\'utilisateur et mot de passe' ;

			          //header('location : login.php');
			          }
			          else if (isset($_POST['username']) AND isset($_POST['passwd']))
			          {
			          	try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=dzhealth', 'root', '');
						}
						catch (Exception $e)
						{
							die('Erreur : ' . $e->getMessage());
						} 

						$req= $bdd->prepare('Select * from medecin where idmedecin = ?');
						$req->execute(array($_POST['username']));

						if(!$data = $req->fetch()) echo 'Nom d\'utilisateur ou mot de passe erroné!!';
						else {
							if ($_POST['passwd'] != $data['passwd']) echo 'Nom d\'utilisateur ou mot de passe erroné!!';
							else {
								$_SESSION['username'] = $_POST['username'];
								$_SESSION['nom'] = $data['nom'];
								$_SESSION['prenom'] = $data['prenom'];
							?>
								<meta http-equiv="refresh" content="0 ; url=index.php">
							<?php
						}
						}

			          } 
			          $_POST['passwd'] = '';$_POST['username']='';

			          }
					?>
		            </div>
		        </div>

		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Mot de Passe oublié ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Veuillez saisir votre adresse e-mail pour réinitialiser votre mot de passe.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Annuler</button>
		                          <button class="btn btn-theme" type="button">Valider</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		      </form>	  	
	  		   	
	  		   	<div class = "seadev-logo">
	  		   		<p >
	  		   			Développé par <image src="assets/img/seadev-logo.png" alt="seadev-logo" />
	  		   		</p>
	  		   	</div>	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg4.jpg", {speed: 500});
        //$.backstretch("assets/img/login-bg5.png", {speed: 500});
    </script>


  </body>
</html>
