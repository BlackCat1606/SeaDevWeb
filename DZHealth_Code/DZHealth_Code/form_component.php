<?php
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DZHealth - Nouveau Patient</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
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

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>DZHealth</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.php#">
                            <i class="fa fa-calendar"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Vous avez 4 Rendez-Vous</p>
                            </li>
                            <li class="external">
                                <a href="calendar.php">Voir tous les Rendez-Vous</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- bell dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.php#">
                            <i class="fa fa-bell"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Vous avez 5 notifications</p>
                            </li>
                            <li>
                                <a href="index.php#">Voir toutes les notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <!--Logout-->
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">Se Déconnecter</a></li>
              </ul>
            </div>
            <!-- Lock-Screen-->
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="lock_screen.php">Verouiller</a></li>
              </ul>
            </div>
            
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <!-- Pic -->
                  <p class="centered"><a href="#"><img src="assets/img/ui-med.png" class="img-circle" width="80 " height="80"></a></p>
                  <!-- Prenom + NOM -->
                  <h5 class="centered">
                    <?php 
                      if ($_SESSION['prenom']!='' and $_SESSION['nom']!='') echo $_SESSION['prenom'].' '.$_SESSION['nom'];
                      else echo '';
                    ?>
                  </h5>
                  <!-- Accueil -->
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Accueil</span>
                      </a>
                  </li> 
                  <!-- Patients -->
                  <li class="active sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-stethoscope"></i>
                          <span class="active">Patients</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="list.php">Liste Patients</a></li>
                          <li><a class="active"  href="form_component.php">Nouveau Patient</a></li>
                      </ul>
                  </li>
                  
                  <!-- Calendrier -->
                  <li class="mt">
                      <a  href="calendar.php">
                          <i class="fa fa-calendar"></i>
                          <span>Calendrier</span>
                      </a>
                  </li>
                  <!-- Lock-Screen -->
                  <li class="mt">
                      <a  href="lock_screen.php">
                          <i class="fa fa-lock"></i>
                          <span>Verouiller</span>
                      </a>
                  </li>

                  <!-- A propos -->
                  <li class="mt">
                    <a  href="apropos.php">
                        <i class="fa fa-info"></i>
                        <span>A Propos</span>
                    </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Nouveau Patient</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb">
                          <i class="fa fa-angle-right"></i> 
                          Informations
                      </h4>
                      <form class="form-horizontal style-form" method="post">
                          <!-- Nom -->
                          <div class="form-group">
                              <label class="label-bold col-sm-2 col-sm-2 control-label">Nom</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="nom" required>
                              </div>
                          </div>
                          <!-- Prénom -->
                          <div class="form-group">
                              <label class="label-bold col-sm-2 col-sm-2 control-label">Prénom</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="prenom" required>
                              </div>
                          </div>
                          <!-- Date de niassance -->
                          <div class="form-group">
                              <label class="label-bold col-sm-2 col-sm-2 control-label">Date de naissance</label>
                              <div class="col-sm-10">
                                  <input type="date"  class="form-control"  name="datenaiss" placeholder="aaaa-mm-jj">
                              </div>
                          </div>
                          <!-- Sexe -->
                          <div class="form-group">
                              <label class="label-bold col-sm-2 col-sm-2 control-label sexe-label"> Sexe </label>
                              <select class="form-control sexe-select" name ="sexe" required>
                              <option> -- </option>
                              <option> Feminin </option>
                              <option> Masculin </option>
                              </select> 
                          </div>
                          <!-- Adresse -->
                           <div class="form-group">
                              <label class="label-bold col-sm-2 col-sm-2 control-label">Adresse</label>
                              <div class="col-sm-10">
                                  <input type="date"  class="form-control" name="adresse" >
                              </div>
                          </div>   
                          <!-- Tel -->
                          <div class="form-group">
                              <label class="label-bold col-sm-2 col-sm-2 control-label">Téléphone</label>
                              <div class="col-sm-10">
                                  <input type="date"  class="form-control" name="tel" >
                              </div>
                          </div> 
                          <!-- Type -->
                          <div class="form-group">
                            <label class="label-bold col-sm-2 col-sm-2 control-label">Type </label>
                            <div class="col-sm-10">
                              <label class="checkbox-inline">
                              <input type="checkbox" id="inlineCheckbox1" value="A" name="A"> Alzheimer
                              </label>
                              <label class="checkbox-inline">
                              <input type="checkbox" id="inlineCheckbox2" value="D" name="D"> Diabéte
                              </label>
                              <label class="checkbox-inline">
                               <input type="checkbox" id="inlineCheckbox3" value="G" name="G"> Grossesse à risque
                              </label>
                            </div>
                          </div>
                          <!-- Valider -->
                          <div class="form-group">
                          <button class="label-bold btn btn-theme btn-block btn-nv-patient" name = "valider" type="submit"> Valider</button>
                          </div>

                         
                          <?php
                              if (isset($_POST['valider']))
                              {
                                if (!isset($_POST['A']) AND !isset($_POST['D']) AND !isset($_POST['G'])) {
                                  ?>
                                  <p class ='red' > Veuillez choisir le type du patient </p>
                                  <?php
                                }
                                else{
                                $nom=' ';$prenom=' ';$datenaiss=' ';$sexe=' ';$adresse=' ';$tel=' ';$type=' ';
                                if (isset($_POST['nom']))       $nom        = strtoupper($_POST['nom']); 
                                if (isset($_POST['prenom']))    $prenom     = ucfirst(strtolower($_POST['prenom']));
                                if (isset($_POST['datenaiss'])) $datenaiss  = $_POST['datenaiss'];
                                if (isset($_POST['sexe']))      $sexe       = $_POST['sexe'];
                                if (isset($_POST['adresse']))   $adresse    = $_POST['adresse'];
                                if (isset($_POST['tel']))       $tel        = $_POST['tel'];
                                if (isset($_POST['A']))         $type       = 'A';
                                if (isset($_POST['D']))         $type       = $type.'D';
                                if (isset($_POST['G']))         $type       = $type.'G';
                                $idpatient = substr(strtolower($prenom),0,1).'_'.strtolower($nom);
                                $passwd = 'seadev';
                                $idmedecin = $_SESSION['username'];
                                try
                                  {
                                    $bdd = new PDO('mysql:host=localhost;dbname=dzhealth', 'root', '');
                                  }
                                  catch (Exception $e)
                                  {
                                    die('Erreur : ' . $e->getMessage());
                                  } 

                                  $req= $bdd->prepare('INSERT INTO patient (idpatient, passwd, nom, prenom, datenaiss, sexe, adresse, tel, type, idmedecin) values (?,?,?,?,?,?,?,?,?,?) ');
                                  $req->execute(array($idpatient,$passwd,$nom,$prenom,$datenaiss,$sexe,$adresse,$tel,$type,$idmedecin));
                                  $req->closeCursor();
                                  $ajout = true;
                                  ?>
                                  <meta http-equiv="refresh" content="0 ; url=list.php">
                                  <?php
                                }
                              }
                          ?>
                                                   
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	        	         	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 - SeaDev
              <a href="form_component.php" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
