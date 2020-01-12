<?php
$page_title ="Suppression un gtypes  ";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include("../header.php");

if($idm->getRole()=="admin"){


    if(!isset($_GET["gtid"])){
        include("del_gtypes.php");
    } else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"])){
        include("sup_form_gtypes.php");
    } else if (isset($_POST["annuler"])){
        echo "Operation annulee";
    } else {
        $gtid=$_GET["gtid"];
        require("../db_config.php");

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $SQL="DELETE FROM gtypes WHERE (gtid  NOT IN (SELECT gtid FROM groupes)) ";
            $st = $db->prepare($SQL);

            $res= $st->execute([$gtid]);

            if(!$res){
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../gtypes/list_gtypes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php
                echo "<p><center><h2> Erreur de suppression</h2></center></p>";

            }else{
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../gtypes/list_gtypes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php
                echo "<p><center><h2>La  suppression à été effectuée </h2></center></p>";
           
            }
            $db=null;

         }catch(PDOException $e) {
             echo "Erreur SQL:".$e->getMessage();
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
