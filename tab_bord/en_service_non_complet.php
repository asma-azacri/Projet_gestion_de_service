<?php
$page_title= "chaque groupe";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include( "../db_config.php");
include("../header.php");
if($idm->getRole()=="admin"){

?>
<br/><br/>


<br/><br/>
    <div class="container">
         <br />
         <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

         <div class="titre"><h3><center>les enseignants avec service non complet</center></h3>  </div>

         <div class="table-responsive" >
              <table id="employee_data" class="table table-striped table-bordered" >
                   <thead>
                        <tr >
                                   <td>enseignants</td>
                                   <td>heures affectées</td>
                                   <td>heures restantes</td>

                        </tr>
                   </thead>

<?php
 
try {          
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = " SELECT e.nom,e.prenom ,SUM(a.nbh) as nbheffectue,(et.nbh)-SUM(a.nbh) as nbhrestants FROM `enseignants`e ,`affectations` a,
     `etypes` et  WHERE  e.eid=a.eid AND et.etid=e.etid AND e.annee=$_SESSION[annee]  GROUP BY e.nom ";
     $st = $db->query($sql);
     $nbhmanquant1=0;
     $sum1=0;
      foreach ($st as $row  ) {
          echo "<tr>";
          echo "<td>$row[nom]  $row[prenom]</a></td>";
          echo "<td>$row[nbheffectue]</a></td>";
          echo "<td>$row[nbhrestants]  </a></td>";
  
          $sum1=$sum1 + $row['nbheffectue'];
          $nbhmanquant1=$nbhmanquant1+$row['nbhrestants'] ;
 
       echo "</tr>";
      }
      echo "<td><h4>le totale de nombre d'heure effectué : $sum1</h4></td>";        
      echo "<td><h4>le nombre total  d'heure manquante :  $nbhmanquant1</h4></td>";        
  
    $db=null;
    }

catch(PDOException $e) {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}


}else{ 
     echo "<br>"  ;
     echo "<br>" ;
     echo "<br>";
     echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
   }

include ("../footer.php");

?>
