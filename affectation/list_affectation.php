<?php
$page_title= "liste des utilisateurs";
require_once("../trame_auth/auth/EtreAuthentifie.php");

include( "../db_config.php");
include("../header.php");
if($idm->getRole()=="admin"){

?>
      <body>
           <br /><br />
           <div class="container">
                <h3 align="center">Affactation d'un groupe à un enseignant</h3>
                <br />
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                    <td>Nom</td>
                                    <td>prenom</td>
                                    <td>groupe</td>
                                    <td>nbh</td>
                                    <td>modifier</td>
                                    <td>supprimer</td>



                               </tr>
                          </thead>

<?php

include( "../db_config.php");

try {
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT e.nom ,e.prenom ,g.nom as groupe ,a.nbh, a.gid ,a.eid as eid FROM `enseignants` e INNER JOIN `affectations` a ON a.eid=e.eid INNER JOIN `groupes` g ON g.gid=a.gid where g.annee=$_SESSION[annee] AND e.annee=$_SESSION[annee]";
     $st = $db->query($sql);

    foreach ($st as $row  ) {
echo "<tr >";

        echo "<td>$row[nom]</a></td>";
        echo "<td>$row[prenom]</a></td>";
        echo "<td>$row[groupe]</a></td>";
        echo "<td>$row[nbh]</a></td>";

        echo "<td><a href=\"mod_aff.php?eid=$row[eid]&gid=$row[gid]&nbh=$row[nbh]\"><img style=height:30px src=../image/mod.png></td>";
        echo "<td><a href=\"sup_aff.php?eid=$row[eid]&gid=$row[gid]&nbh=$row[nbh]\"><img style=height:30px src=../image/sup.jpg></a></td>";


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

