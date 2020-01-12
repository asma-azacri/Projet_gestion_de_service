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

         <div class="titre"><h3><center>les modules avec des heures non effectés</center></h3>  </div>

         <br/><br/>
   
         <div class="table-responsive" >
              <table id="employee_data" class="table table-striped table-bordered" >
                   <thead>
                        <tr >
                                   <td>module</td>
                                  <td>heures affectées</td>
                                   <td>heures restantes</td>
                        </tr>
                   </thead>

<?php
 
try {          
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = " SELECT m.intitule ,g.nom as groupe,e.nom,e.prenom ,SUM(a.nbh) as nbheffectue,(SUM(gt.nbh)-SUM(a.nbh)) as nbhrestants FROM `groupes` g ,`modules` m ,`enseignants`e ,`affectations` a,
    `gtypes` gt  WHERE m.mid=g.mid AND e.eid=a.eid AND g.gid=a.gid AND gt.gtid=g.gtid  GROUP BY m.intitule";
    $st = $db->query($sql);
    $nbhmanquant=0;
    $sum=0;
     foreach ($st as $row  ) {
         echo "<tr>";
         echo "<td>$row[intitule]</a></td>";
         echo "<td>$row[nbheffectue]</a></td>";
         echo "<td>$row[nbhrestants]  </a></td>";
 
         $sum=$sum + $row['nbheffectue'];
 
         $nbhmanquant=$nbhmanquant+$row['nbhrestants'] ;

      echo "</tr>";
     }
     echo "<td><h4>le totale de nombre d'heure effectué : $sum</h4></td>";        
     echo "<td><h4>le nombre total  d'heure manquante :  $nbhmanquant</h4></td>";        
 
     echo "<br>";
     echo "</div>";

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
