<?php
$page_title= "chaque enseignants";
require_once("../trame_auth/auth/EtreAuthentifie.php");

include( "../db_config.php");
include("../header.php");
if($idm->getRole()=="user"){

?>
      <body>
           <br/><br/>
           <div class="container">
                <h1 align="center">Chaque enseignant</h1>
                <br />
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                   <td>intitule</td>
                                   <td>groupes</td>
                                   <td>nbh</td>
                                   <td>eqtd</td>
                                   
                               </tr>
                          </thead>
<?php
$page_title= "chaque enseignants";
     include( "../db_config.php");

 if(!isset($_GET["eid"])){
   include("enseignant_form.php");
   echo "erreur";
 }else{
     $eid= $_GET["eid"];
     require("../db_config.php"); 
     try {
          $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf-8", $username, $password);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT m.intitule ,g.nom as groupe,SUM(a.nbh)as nbh,((gt.coeff)*SUM(a.nbh)) as eqtd ,et.nbh as nbhprof FROM `affectations` a ,`enseignants` e,`groupes` g,`etypes` et ,`gtypes` gt,`modules` m ,`users` u WHERE 
          e.eid =a.eid AND g.mid=m.mid AND gt.gtid=g.gtid AND g.gid=a.gid AND et.etid = e.etid AND u.uid=e.uid AND e.eid=:eid AND  e.annee=$_SESSION[annee] GROUP BY m.intitule ,g.nom";
          $st = $db->prepare($sql);
          $st->execute(array('eid'=>"$eid"));
          $sum=0;
          $nbh=0;
          foreach ($st as $row  ) {
               echo "<tr>";
                     echo "<td>$row[intitule]</td>";
                     echo "<td>$row[groupe]</td>";
                     echo "<td>$row[nbh]</td>";
                     echo "<td>$row[eqtd]</td>";
                     $sum=$sum+$row['nbh'];
                     $nbh=$row['nbhprof']-$sum;

               echo "</tr>";
           }

          echo "<td>le nombre d'heure effectué : $sum</td>";        
          echo "<td>le nombre d'heure n'est pas effectué : $nbh</td>";

     

    $db=null;

} catch(PDOException $e) {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
 }
include ("../footer.php");
}else{ 
     echo "<br>"  ;
     echo "<br>" ;
     echo "<br>";
     echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
   }
 
?>
<p> <a href='../trame_auth/home_users.php'> <img style="height:40px" src="../image/backhome.png">Accueil<a></p>