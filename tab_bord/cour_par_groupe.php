<?php
$page_title= "chaque groupe";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include( "../db_config.php");
include("../header.php");

?>
<br/><br/>
         

<?php
if($idm->getRole()=="admin"){


if(!isset($_POST["gid"])){
      include("cour_par_groupe _form.php");
   }else{
    include("cour_par_groupe _form.php");
      
    ?>

<br/><br/>
    <div class="container">
         <br />
         <div class="table-responsive" >
              <table id="employee_data" class="table table-striped table-bordered" >
                   <thead>
                        <tr >
                            <td>prof</td>
                            <td>nbh</td>
                            <td>eqtd</td>
                           
                        </tr>
                   </thead>
                   
<?php

       $gid= htmlspecialchars($_POST["gid"]);
       require("../db_config.php"); 
  
try {
   $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = " SELECT e.nom,e.prenom ,a.nbh,SUM(gt.nbh) as nbha ,(SUM(gt.nbh)*(gt.coeff)) as eqtd ,a.nbh as nbheffectue  FROM `groupes` g ,`affectations` a,`enseignants` e ,`gtypes` gt,`etypes` et WHERE a.gid = g.gid AND a.eid=e.eid AND gt.gtid=g.gtid   AND e.etid=et.etid  AND g.gid =$gid";
   $st = $db->query($sql);
   $nbhmanquant=0;
   $sum=0;
    foreach ($st as $row  ) {
     echo "<tr>";
        echo "<td>$row[nom]   $row[prenom]</a></td>";
        echo "<td>$row[nbheffectue]</a></td>";
        echo "<td>$row[eqtd]</a></td>";
        $sum=$sum + $row['nbha'];
        $nbhmanquant=$sum-$row['nbheffectue'];
            
     echo "</tr>";
    }
    echo "<td>le nombre d'heure effectué : $sum</td>";

    echo "<td>le nombre d'heures manquantes : $nbhmanquant</td>";

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
