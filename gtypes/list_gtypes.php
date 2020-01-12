
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
                <h3 align="center">Liste des gtypes</h3>
                <br />
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                    <td>gtid</td>
                                    <td>nom</td>
                                    <td>nbh</td>
                                    <td>coeff</td>
                                    <td>modifier</td>
                                    <td>supprimer</td>
                               </tr>
                          </thead>

<?php
$page_title= "liste de gtype";

include( "../db_config.php");

try {
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM gtypes ";
     $st = $db->query($sql);


    foreach ($st as $row  ) {
echo "<tr>";
        echo "<td>$row[gtid]</a></td>";
        echo "<td>$row[nom]</a></td>";
        echo "<td>$row[nbh]</a></td>";
        echo "<td>$row[coeff]</a></td>";
        echo "<td><a href=\"mod_gtypes.php?gtid=$row[gtid]\"><img style=height:30px src=../image/mod.png></td>";
        echo "<td><a href=\"sup_gtypes.php?gtid=$row[gtid]\"><img style=height:30px src=../image/sup.jpg></a></td>";
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

