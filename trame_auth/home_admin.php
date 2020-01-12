<?php

require_once("auth/EtreAuthentifie.php");

  $title = 'accueil';
  include("../header.php");
  $_SESSION['uid']=$idm->getUid();

  if(isset($_POST['annee']) ){
    $_SESSION['annee']= $_POST['annee'];
  }else{
  $_SESSION['annee']= "2019";
}
?>

<body>
 <div class="container-fluid">
     <div class="row">
        <div class=sidenav>
            <br>
            <br>
            <br>

            <button class="dropdown-btn"><img style="height:30px" src="../image/annee1.jpg"> choisir l'année
            <i class="fa fa-caret-down"></i>
           </button>
           <div class="dropdown-container">

            <form method="post" style=" padding: 0;border: none;box-shadow: none;background: none;">

             <select class="browser-default custom-select" style = "width : 80%; color:blue;" name="annee" value =2019 onchange="this.form.submit();">   
                <option  value =2010>2010</option>
        
                <option <?php if($_SESSION['annee'] =='2011' ) echo 'selected'  ?> value =2011>2011</option>
        
                <option <?php if($_SESSION['annee'] =='2012' ) echo 'selected'  ?> value =2012>2012</option>
        
                <option <?php if($_SESSION['annee'] =='2013' ) echo 'selected'  ?>  value =2013>2013</option>
        
                <option <?php if($_SESSION['annee'] =='2014' ) echo 'selected'  ?>  value =2014>2014</option>
        
                <option <?php if($_SESSION['annee'] =='2015' ) echo 'selected'  ?> value =2015>2015</option>
        
                <option <?php if($_SESSION['annee'] =='2016' ) echo 'selected'  ?> value =2016>2016</option>
        
                <option <?php if($_SESSION['annee'] =='2017' ) echo 'selected'  ?>  value =2017>2017</option>
        
                <option <?php if($_SESSION['annee'] =='2018' ) echo 'selected'  ?> value =2018>2018</option>
        
                <option <?php if($_SESSION['annee'] =='2019' ) echo 'selected'  ?>   value =2019>2019</option>
        
                <option <?php if($_SESSION['annee'] =='2020' ) echo 'selected'  ?>  value =2020>2020</option>
               </select>
                </form>
                </div>
                <br>

  <button class="dropdown-btn"><img style="height:30px" src="../image/cour.jpg"> les cours
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="../tab_bord/cour_par_groupe.php"> <h4>cours par groupe</h4></a>
  <a href="../tab_bord/cour_par_module.php"><h4> cours par module</h4></a>
  <a href="../tab_bord/en_service_non_complet.php"><h4>profs avec service non complet</h4></a>
  <a href="../tab_bord/modules_nbh_noneffectue.php"> <h4>les modules ayant des heures non effectue </h4></a>


  </div>
  <br>

<button class="dropdown-btn"><img style="height:30px" src="../image/user.jpg"> Utilisateurs
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="../tab_bord/mod_mdp.php?uid=<?php echo $_SESSION['uid']?>"><img style="height:30px" src="../image/mdp.png"> modifier votre mot de passe </a>

  <a href="../utilisateurs/liste_user.php"><img style="height:30px" src="../image/list.jpeg"> Liste</a>
  <a href="../utilisateurs/ajout_user.php"><img style="height:30px" src="../image/ajout.png"> ajouter</a>
  </div>
  <br>
  <button class="dropdown-btn"><img style="height:30px" src="../image/profA.png"> Enseignants
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="../enseignants/list_enseignants.php"><img style="height:30px" src="../image/list.jpeg"> Liste</a>
  <a href="../enseignants/ajout_enseignants.php"><img style="height:30px" src="../image/ajout.png"> ajouter</a>
  
  </div> 

  <br>
  <button class="dropdown-btn"><img style="height:30px" src="../image/modules.png"> Modules
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="../modules/list_modules.php"><img style="height:30px" src="../image/list.jpeg"> Liste</a>
  <a href="../modules/ajout_modules.php"><img style="height:30px" src="../image/ajout.png"> ajouter</a>
  
  </div>


  <br>
  <button class="dropdown-btn"><img style="height:30px" src="../image/groupe.png"> Groupes
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="../groupes/list_groupes.php"><img style="height:30px" src="../image/list.jpeg"> Liste</a>
  <a href="../groupes/ajout_groupes.php"><img style="height:30px" src="../image/ajout.png"> ajouter</a>
  
  </div>


  <br>

  <button class="dropdown-btn"><img style="height:30px" src="../image/gtypes.jpg"> Gtypes
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="../gtypes/list_gtypes.php"><img style="height:30px" src="../image/list.jpeg"> Liste</a>
  <a href="../gtypes/ajout_gtypes.php"><img style="height:30px" src="../image/ajout.png"> ajouter</a>
  
  </div>
  
  <br>
  <button class="dropdown-btn"><img style="height:30px" src="../image/aff.jpg"> Affectation 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="../affectation/list_affectation.php"><img style="height:30px" src="../image/list.jpeg"> Liste</a>
  <a href="../affectation/aj_affectation.php"><img style="height:30px" src="../image/ajout.png"> ajouter</a>

  
  </div>
  <br>
  
  <button class="dropdown-btn"><img style="height:30px" src="../image/annee.jpg"> copier l'année
      <i class="fa fa-caret-down"></i>
  </button>

  <div class="dropdown-container">
  <a href="../tab_bord/annee_copie.php"> choisir annee</a>
  </div>
  
   </div>
   </div>



<div class="main">
   <br>
   <br>
  <h2><center><?php  echo "BIENVENUE " ."  ". $idm->getIdentity();?>   </center></h2>
  
</div>

<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

<?php
include("../footer.php");
?>
