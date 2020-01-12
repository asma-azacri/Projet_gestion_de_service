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
                <h3 align="center">Liste des modules</h3>
                <br />
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                   <td>mid</td>
                                    <td>intitule</td>
                                    <td>code</td>
                                    <td>eid</td>
                                    <td>cid</td>
                                    <td>annee</td>
                                    <td>choisir</td>

                               </tr>
                          </thead>

<?php
$page_title= "liste des modules";

include("../db_config.php");
     if(!isset($_GET["gid"])){
          include("mod_aff_form_groupes1.php");
     }else{
          $gid= $_GET["gid"];
          require("../db_config.php");
          try {
               $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
               $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "SELECT * FROM modules ";
               $st = $db->query($sql);

    foreach ($st as $row  ) {
echo "<tr>";
        echo "<td>$row[mid]</a></td>";
        echo "<td>$row[intitule]</a></td>";
        echo "<td>$row[code]</a></td>";
        echo "<td>$row[eid]</a></td>";
        echo "<td>$row[cid]</a></td>";
        echo "<td>$row[annee]</a></td>";
         echo "<td><a href=\"get_mid.php?mid=$row[mid]\"><img style=height:30px src=../image/mod.png></td>";
        echo "</tr>";
    }
    $db=null;
   }
} catch(PDOException $e)
   {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();

}else{ 
     echo "<br>"  ;
     echo "<br>" ;
     echo "<br>";
     echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
   }
   include ("../footer.php");

?>
<p> <a href='../trame_auth/index.php'> <img style="height:40px" src="../image/backhome.png">Accueil<a></p>
