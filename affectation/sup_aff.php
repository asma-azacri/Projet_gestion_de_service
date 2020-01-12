<?php
$page_title ="Suppression de l'affectation  ";

require_once("../trame_auth/auth/EtreAuthentifie.php"); 
include("../header.php");

if($idm->getRole()=="admin"){

    if(!isset($_GET["eid"])  || !isset($_GET["gid"]) || !isset($_GET["nbh"])){
        include("del_aff.php");
    } else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"])){
        include("sup_form_aff.php");
       
    } else if (isset($_POST["annuler"])){
        echo "Operation annulee";
    } else {
        $gid=$_GET["gid"];
        $eid=$_GET["eid"];
        $nbh=$_GET["nbh"];
       
        require("../db_config.php");
        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $SQL="DELETE FROM affectations WHERE eid =? AND gid=? AND nbh=?";
            $st = $db->prepare($SQL);
            $res= $st->execute(array($eid,$gid,$nbh));

            if(!$res){
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php
                echo "<p><center><h2> Erreur de suppression</h2></center></p>";

            }else{
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php
                echo "<p><center><h2>La  suppression a été effectuée </h2></center></p>";
            }
            $db=null;

         }catch(PDOException $e) {
             echo "Erreur SQL:".$e->getMessage();
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
