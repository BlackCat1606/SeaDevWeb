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

    <title>DZHealth - Liste Patients </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

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
                  <p class="centered"><a href="#"><img src="assets/img/ui-med.png" class="img-circle" width="80" height="80"></a></p>
                  <!-- Prenom + NOM -->
                  <h5 class="centered">
                    <?php 
                      if ($_SESSION['prenom']!='' and $_SESSION['nom']!='') echo $_SESSION['prenom'].' '.$_SESSION['nom'];
                      else echo '';
                    ?>
                  </h5>
                  <!-- Accueil -->
                  <li class="mt">
                      <a  href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Accueil</span>
                      </a>
                  </li> 
                  <!-- Patients -->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-stethoscope"></i>
                          <span>Patients</span>
                      </a>
                      <ul class="sub">
                          <li><a class="active" href="list.php">Liste Patients</a></li>
                          <li><a  href="form_component.php">Nouveau Patient</a></li>
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
      <?php 
        try
        {
          $bdd = new PDO('mysql:host=localhost;dbname=dzhealth', 'root', '');
        }
        catch (Exception $e)
        {
          die('Erreur : ' . $e->getMessage());
        } 

        $req= $bdd->prepare('Select idpatient,nom,prenom,sexe,type from patient where idmedecin = ?');
        $req->execute(array($_SESSION['username']));
      ?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Liste des Patients</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
              <div class="content-panel">
              <!--<h4><i class="fa fa-angle-right"></i> Responsive Table</h4>-->
                <section id="unseen">
                    
                  <?php
                    if(!$data = $req->fetch()) {?> <p class="space">   Aucun patient! </p>
                    <?php
                    }
                    else 
                    {                                  
                      ?>

                    <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    do{
                      $id = 'patient.php?id='.$data['idpatient'];
                    ?>
                      <tr>
                      <td> <a href= "<?php echo $id; ?> "> 
                               <?php echo $data['idpatient'] ?>  
                            </a>
                      </td>
                      <td> <?php echo $data['nom'] ?>        </td>
                      <td> <?php echo $data['prenom'] ?>     </td>
                      <td> 
                        <?php 
                        if ($data['sexe']=='F') echo 'Feminin';
                        else echo 'Masculin';  
                        ?>       
                      </td>
                      <td> 
                        <?php 
                          $str = $data['type'];
                          if (strlen($str) == 1) echo $str;
                          else if ($str != NULL ) {
                            for ($i=0; $i<strlen($str); $i++) echo substr($str,$i,1).', ';
                          }
                          ?>     
                      </td>
                  </tr>
                  <?php 
                        }while ($data = $req->fetch());
                      
                ?>
                  </tbody>

                  </table>
                  <p class='type-patient'> Type: A (Alzheimer), D (Diabète), G (Grossesse à risque) </p>

                  <?php
                  }
                      $req->closeCursor();
                      ?>
                </section>
              </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->			
		  	 </div><!-- /row -->
		  		  	

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 - SeaDev
              <a href="list.php" class="go-top">
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
    

  </body>
</html>
