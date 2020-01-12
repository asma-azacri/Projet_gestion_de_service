
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
                <h3 align="center">Liste des enseignants</h3>
                <br />
                <div class="table-responsive" >
                     <table id="employee_data" class="table table-striped table-bordered" >
                          <thead>
                               <tr >
                                    <td>Eid</td>
                                    <td>nom</td>
                                    <td>prenom</td>
                                    <td>login</td>
                                    <td>email</td>
                                    <td>tel</td>
                                    <td>type</td>
                                    <td>annee</td>
                                    <td>modifier</td>
                                    <td>supprimer</td>
                               </tr>
                          </thead>

<?php
$page_title= "liste des enseignants";
include( "../db_config.php");
try {
 
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT e.eid,e.nom,e.nom,u.login as utilisateur,e.nom,e.prenom,e.email,e.tel,et.nom as typesprof,e.annee FROM `enseignants` e ,`users`u,`etypes` et WHERE u.uid=e.uid AND et.etid=e.etid ANd e.annee =$_SESSION[annee]";

     $st = $db->query($sql);

    foreach ($st as $row  ) {
echo "<tr>";
        echo "<td>$row[eid]</a></td>";
        echo "<td>$row[nom]</a></td>";
        echo "<td>$row[prenom]</a></td>";
        echo "<td>$row[utilisateur]</a></td>";
        echo "<td>$row[email]</a></td>";
        echo "<td>$row[tel]</a></td>";
        echo "<td>$row[typesprof]</a></td>";
        echo "<td>$row[annee]</a></td>";

        echo "<td><a href=\"mod_enseignants.php?eid=$row[eid]\"><img style=height:30px src=../image/mod.png></td>";

        echo "<td><a href=\"sup_enseignants.php?eid=$row[eid]\"><img style=height:30px src=../image/sup.jpg></a></td>";

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
