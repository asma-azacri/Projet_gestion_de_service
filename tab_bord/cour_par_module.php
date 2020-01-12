<?php
$page_title= "chaque groupe";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include( "../db_config.php");
include("../header.php");

?>
<br/><br/>
<?php

if($idm->getRole()=="admin"){


if(!isset($_POST["mid"])){
      include("cour_par_module _form.php");
   }else{
    include("cour_par_module _form.php");
      
    ?>

<br/><br/>
    <div class="container">
         <br />
         <div class="table-responsive" >
              <table id="employee_data" class="table table-striped table-bordered" >
                   <thead>
                        <tr >
                                   <td>module</td>
                                   <td>groupe</td>
                                   <td>prof</td>
                                   <td>eqtd</td>
                                   <td> nombre d'heure effectué</td>
                                   <td>nombre d'heure de groupe</td>
                           
                        </tr>
                   </thead>


<?php
  $mid= htmlspecialchars($_POST["mid"]);
  require("../db_config.php"); 

try {          
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = " SELECT m.intitule ,g.nom as groupe,e.nom,e.prenom ,a.nbh as nbheffectue,SUM(gt.nbh) as nbhdegroupes , ((SUM(gt.nbh))*(gt.coeff)) as eqtd  FROM `groupes` g ,`modules` m ,`enseignants`e ,`affectations` a,
    `gtypes` gt  WHERE m.mid=g.mid AND e.eid=a.eid AND g.gid=a.gid AND gt.gtid=g.gtid AND m.mid=$mid  GROUP BY groupe";
    $st = $db->query($sql);
    $nbhmanquant=0;
    $sum=0;
    $nbhtotal=0;
     foreach ($st as $row  ) {
         echo "<tr>";
         echo "<td>$row[intitule]</a></td>";
         echo "<td>$row[groupe]</a></td>";

         echo "<td>$row[nom]  $row[prenom]</a></td>";
         echo "<td>$row[eqtd]</a></td>";

         echo "<td>$row[nbheffectue]</a></td>";
 
         echo "<td>$row[nbhdegroupes]</a></td>";
         $sum=$sum + $row['nbheffectue'];
         $nbhmanquant=$nbhmanquant+$row['nbhdegroupes'] ;
 
         
      echo "</tr>";
     }
       $nbhtotal= $nbhmanquant- $sum;
 
     echo "<td><h4>le nombre d'heure effectué : $sum</h4></td>";        
     echo "<td><h4>le nombre d'heures des groupes : $nbhmanquant</h4></td>";
     echo "<td><h4>le nombre total  d'heure manquante : $nbhtotal</h4></td>";        
 

    $db=null;
    }

catch(PDOException $e) {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
}
}else{ 
     echo "<br>"  ;
     echo "<br>" ;
     echo "<br>";
     echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
   }
include ("../footer.php");
?>