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

    <title>DZHealth - Dossier Patient</title>

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
                      else echo 'Rien';
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

                  <!-- A propos-->
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
          <section class="wrapper site-min-height">
          	<h3 class="mb"><i class="fa fa-angle-right"></i> Patient : <?php echo $_GET['id']; ?> </h3>
            <!-- PHP Code  -->
            <?php
              try
              {
                $bdd = new PDO('mysql:host=localhost;dbname=dzhealth', 'root', '');
              }
              catch (Exception $e)
              {
                die('Erreur : ' . $e->getMessage());
              } 
              $idpatient=$_GET['id'];
              $req= $bdd->prepare('Select nom,prenom,datenaiss,sexe,adresse,tel,type from patient where idpatient = ?');
              $req->execute(array($idpatient));
              if(!$data = $req->fetch()) echo 'Erreur! ';
              else{
                $nom=$data['nom']; $prenom=$data['prenom']; $datenaiss=$data['datenaiss']; $adresse=$data['adresse']; $tel=$data['tel'];
                $sexe=$data['sexe']; $type=$data['type'];

                $A=false; $D=false; $G=false;
                for ($i=0; $i<strlen($type); $i++) {
                  $typei = substr($type,$i,1);
                  if ($typei == 'A') $A=true;
                  else if($typei == 'D') $D=true;
                  else $G=true;
                }
              }
              $req->closeCursor();
            ?>
            <!-- PHP Code  -->

            <!-- Informations -->
          	<div class="row mt">
              <div class="col-lg-12">
                <div class="form-panel form-patient">
                <h4 class="mb">
                          <i class="fa fa-angle-right"></i> 
                          Informations
                      </h4>
                <form class="form-horizontal style-form " method="post" action="patient.php"> 
                  <!-- Nom  -->
                  <div class="form-group-patient form-group ">
                    <label class="label-bold col-sm-2 col-sm-2 control-label">Nom</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"> <?php echo $nom; ?> </p>
                    </div>
                  </div>
                  <!-- Prenom  -->
                  <div class="form-group-patient form-group ">
                    <label class="label-bold col-sm-2 col-sm-2 control-label">Prénom</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"> <?php echo $prenom; ?> </p>
                    </div>
                  </div>
                  <!-- Date Naissance  -->
                  <div class="form-group-patient form-group ">
                    <label class="label-bold col-sm-2 col-sm-2 control-label label-patient">Date de Naissance</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"> <?php echo $datenaiss; ?> </p>
                    </div>
                  </div>
                  <!-- Sexe  -->
                  <div class="form-group-patient form-group ">
                    <label class="label-bold col-sm-2 col-sm-2 control-label">Sexe</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"> 
                          <?php 
                            if($sexe == 'F') echo 'Feminin';
                            else if ($sexe == 'M') echo 'Masculin';
                            else echo '--';
                           ?>
                        </p>
                    </div>
                  </div>
                  <!-- Type  -->
                  <div class="form-group-patient form-group ">
                    <label class="label-bold  col-sm-2 col-sm-2 control-label">Type Maladie</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"> 
                          <?php  
                            
                              if ($A) echo 'Alzheimer ';
                              if($D) echo 'Diabéte ';
                              if($G) echo 'Grossesse à risque';
                            
                          ?> 
                        </p>
                    </div>
                  </div>
                  <!-- Adresse  -->
                  <div class="form-group-patient form-group ">
                    <label class="label-bold col-sm-2 col-sm-2 control-label">Adresse</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"> <?php echo $adresse; ?> </p>
                    </div>
                  </div>
                  <!-- Tel  -->
                  <div class="form-group-patient form-group ">
                    <label class="label-bold col-sm-2 col-sm-2 control-label ">Téléphone</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"> <?php echo $tel; ?> </p>
                    </div>
                  </div>

                  </div>
                </form>
            		</div>
          	  </div>
            </div>

            <!-- Liste prélèvements -->
            <?php  
             //Si pas Alzheimer afficher les prélèvements
             if(!$A or $D or $G){
            ?> 
            <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel-patient content-panel ">
                      <!--<h4><i class="fa fa-angle-right"></i> Responsive Table</h4>-->
                        <section id="unseen">
                          <h4 class="mb">
                            <i class="fa fa-angle-right"></i> 
                            Liste prélèvements
                          </h4>
                          <?php 
                                try
                                {
                                  $bdd = new PDO('mysql:host=localhost;dbname=dzhealth', 'root', '');
                                }
                                catch (Exception $e)
                                {
                                  die('Erreur : ' . $e->getMessage());
                                } 

                                $req= $bdd->prepare('Select * from prelevement where idpatient = ?');
                                $req->execute(array($idpatient));
                                if(!$data = $req->fetch()) { ?> <p class="space">   Aucun Prélèvement! </p>
                         
                                 <?php
                                  }
                                  else 
                                  {                                  
                                    ?>

                                <table class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>
                                      <th>N°</th>
                                      <th>Type</th>
                                      <th>Résultat</th>
                                      <th>Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  do{
                            ?>
                            <tr>
                                <td> <?php echo $data['idprelevement'] ?>   </td>
                                <td> 
                                  <?php 
                                    $typeprelev = $data['type'] ;
                                    if ($typeprelev == 'G') echo 'Glycémie';
                                    else if ($typeprelev == 'T') echo 'Tension Artérielle';
                                    else if ($typeprelev == 'P') echo 'Poids';
                                    else echo $typeprelev;
                                  ?>            
                                </td>
                                <td> <?php echo $data['resultat'] ?>        </td>
                                <td> <?php echo $data['date'] ?>            </td>
                            </tr>

                            <?php 
                                  }while ($data = $req->fetch());
                                }
                                $req->closeCursor();
                            ?>
                            </tbody>

                          </table>
                        </section> <!-- END Section -->
                      </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->     
            </div><!-- /row -->
            <?php } ?>

             <!-- Liste Traitements -->
            <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel-patient content-panel ">
              <!--<h4><i class="fa fa-angle-right"></i> Responsive Table</h4>-->
                <section id="unseen">
                  <h4 class="mb">
                    <i class="fa fa-angle-right"></i> 
                    Liste Traitements
                  </h4>
                  <?php 
                    $req= $bdd->prepare('Select * from traitement where idpatient = ?');
                    $req->execute(array($idpatient));
                    if(!$data = $req->fetch()) { ?> <p class="space">   Aucun traitement! </p>
             
                    <?php
                    }
                    else 
                    {                                  
                      ?>

                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Libellé</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      do{
                  ?>
                    <tr>
                        <td> <?php echo $data['idtraitement'] ?>   </td>
                        <td> <?php echo $data['libelle'] ?>            </td>
                    </tr>

                    <?php 
                          }while ($data = $req->fetch());
                        }
                        $req->closeCursor();
                    ?>
                    </tbody>

                  </table>
                </section> <!-- END Section -->
              </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->     
            </div><!-- /row -->

            <!-- Liste RDV -->
            <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel-patient content-panel ">
              <!--<h4><i class="fa fa-angle-right"></i> Responsive Table</h4>-->
                <section id="unseen">
                  <h4 class="mb">
                    <i class="fa fa-angle-right"></i> 
                    Liste Rendez-Vous
                  </h4>
                  <?php 
                    $req= $bdd->prepare('Select * from rdv where idpatient = ?');
                    $req->execute(array($idpatient));
                    if(!$data = $req->fetch()) { ?> <p class="space">   Aucun Rendez-vous! </p>
             
                    <?php
                    }
                    else 
                    {                                  
                      ?>

                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      do{
                  ?>
                      
                    <tr>
                        <td> <?php echo $data['idrdv'] ?>   </td>
                        <td> <?php echo $data['dateRDV'] ?>            </td>
                    </tr>

                    <?php 
                          }while ($data = $req->fetch());
                        }
                        $req->closeCursor();
                    ?>
                    </tbody>

                  </table>
                </section> <!-- END Section -->
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
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
