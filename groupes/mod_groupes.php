
<?php
 $page_title="Modifier un enseignant";
require_once("../trame_auth/auth/EtreAuthentifie.php");

  include("../header.php");
  if($idm->getRole()=="admin"){

 if (!isset($_GET["gid"])) {
    include("mod_form_groupes1.php");
 }else {
$gid = htmlspecialchars($_GET["gid"]);
     require("../db_config.php");
try {
         $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $SQL = "SELECT nom,annee,gtid FROM groupes WHERE gid=:gid";
         $st = $db->prepare($SQL);
         $st->execute(array('gid'=>"$gid"));
foreach ($st as $row){
         $nom=htmlspecialchars($row['nom']);
         $annee=htmlspecialchars($row['annee']);
         $gtid=htmlspecialchars($row['gtid']);
}
         if ($st->rowCount() ==0) {
            echo "<p>Erreur dans le gid</p>\n";
         } else if ( !isset($_POST['nom'])  || !isset($_POST['annee']) || !isset($_POST['gtid'])){
            include("mod_form_groupes.php");
         } else {
             $nom = htmlspecialchars($_POST['nom']);
             $annee=htmlspecialchars($_POST['annee']);
             $gtid=htmlspecialchars($_POST['gtid']);

             if ( $nom=="" || !is_numeric($annee)   ) {
                include("mod_form_groupes.php");
             }else{

                 $SQL = "UPDATE groupes SET nom=?, annee=? , gtid=? WHERE gid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array( $nom, $annee, $gtid, $gid));
                 
                if (!$res){
                  echo "<br>";
                  echo "<br>";
                  echo "<br>";
                  ?>
                  <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                 <?php
                  echo "<p><center><h2>Erreur de modification</h2></center></p>";
                }else{
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    ?>
                    <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                   <?php
                    echo "<p><center><h2>La modification a été effectuée</h2></center></p>";

               }
            }
          }
         $db=null;
     }
 
catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
     }
 } 

}else{ 
   echo "<br>"  ;
   echo "<br>" ;
   echo "<br>";
   echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
 }
 include("../footer.php");

?>
