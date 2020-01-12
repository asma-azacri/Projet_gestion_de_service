<?php
$page_title= "liste des enseignants";
require_once("../trame_auth/auth/EtreAuthentifie.php");

include( "../db_config.php");
include("../header.php");
if($idm->getRole()=="admin"){

?>

      <body>
           <br /><br />
           <div class="container">
                <h3 align="center">Liste des groupes</h3>
                <br />
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                    <td>gid</td>
                                    <td>module</td>
                                    <td>nom</td>
                                    <td>annee</td>
                                    <td>gtypes</td>
                                    <td>modifier</td>
                                    <td>modifier le module</td>
                                    <td>supprimer</td>
                               </tr>
                          </thead>

<?php
$page_title= "liste des groupes";

include( "../db_config.php");

try {
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT g.gid,m.intitule as module ,g.nom,g.annee,gt.nom as gtypes FROM `groupes` g ,`modules` m,`gtypes` gt where g.mid=m.mid AND gt.gtid=g.gtid AND  g.annee =$_SESSION[annee]  ";
     $st = $db->query($sql);

    foreach ($st as $row  ) {
echo "<tr>";
        echo "<td>$row[gid]</a></td>";
        echo "<td>$row[module]</a></td>";
        echo "<td>$row[nom]</a></td>";
        echo "<td>$row[annee]</a></td>";
        echo "<td>$row[gtypes]</a></td>";
        echo "<td><a href=\"mod_groupes.php?gid=$row[gid]\"><img style=height:30px src=../image/mod.png></td>";
        echo "<td><a href=\"mod_aff_groupes.php?gid=$row[gid]\"><img style=height:30px src=../image/mod.png></td>";
        echo "<td><a href=\"sup_groupes.php?gid=$row[gid]\"><img style=height:30px src=../image/sup.jpg></a></td>";

echo "</tr>";
    }

    $db=null;
   }

catch(PDOException $e)
   {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
?>
<p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil<a></p>

<?php

}else{ 
     echo "<br>"  ;
     echo "<br>" ;
     echo "<br>";
     echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
   }
   include ("../footer.php");

?>
<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  

