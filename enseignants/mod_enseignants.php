<?php
$page_title =" Modifier un enseignant";

require_once("../trame_auth/auth/EtreAuthentifie.php");
include("../header.php");

if($idm->getRole()=="admin"){
if(!isset($_GET["eid"])){
    include("mod_form_enseignants1.php");
}else{
    $eid=htmlspecialchars($_GET["eid"]);
    require("../db_config.php");
        try{
        $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $SQL = "SELECT * FROM enseignants WHERE eid=:eid";
        $st = $db->prepare($SQL);
        $st->execute(array('eid'=>"$eid"));
        foreach($st as $row){
            $nom=htmlspecialchars($row['nom']);
            $prenom=htmlspecialchars($row['prenom']);
            $email=htmlspecialchars($row['email']);
            $tel=htmlspecialchars($row['tel']);
            $etid=htmlspecialchars($row['etid']);
            $annee=htmlspecialchars($row['annee']);
        }

        if($st->rowCount()==0){
            echo "<p>Erreur dans eid </p>\n";
        }else if (!isset($_POST['nom']) || !isset($_POST['prenom'])|| !isset($_POST['email']) ||!isset($_POST['tel']) ||!isset($_POST['etid']) ||!isset($_POST['annee']) ){
               include("mod_form_enseignants.php");
        }else{
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $email=htmlspecialchars($_POST['email']);
            $tel=htmlspecialchars($_POST['tel']);
            $etid=htmlspecialchars($_POST['etid']);
            $annee =htmlspecialchars($_POST['annee']);

            if( $nom=="" ||$prenom=="" ||!(filter_var($email,FILTER_VALIDATE_EMAIL)) ||!is_numeric($tel)||!$tel>0  ||!isset($etid)  ||!isset($annee) ){
               include("mod_form_enseignants.php");
            }else{
             //modification
            $SQL = "UPDATE enseignants SET nom=?,prenom=?,email=?,tel=?,etid=?,annee=? WHERE eid=?";
            $st = $db->prepare($SQL);
            $res=$st->execute(array($nom,$prenom,$email,$tel,$etid,$annee,$eid));
            if(!$res){
                echo  "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php
                echo "<p><h2><center>Erreur de modification</h2></center> </p>";
            }else{
                 echo  "<br>";
                 echo "<br>";
                 echo "<br>";
                 ?>
                 <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                <?php
                 echo "<p><h2><center>La modification à été effectuée <center></h2></p>";
            }
          }
         }
         $db=null;
        }catch(PDOException $e){
                echo "Erreur SQL :".$e->getMessage();
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
