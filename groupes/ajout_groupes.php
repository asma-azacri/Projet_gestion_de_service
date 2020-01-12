<?php

$page_title="Ajouter un groupe ";


require_once("../trame_auth/auth/EtreAuthentifie.php");

include("../header.php");
if($idm->getRole()=="admin"){

if(!isset($_POST['mid'])|| !isset ($_POST['nom']) || !isset ($_POST['annee']) || !isset ($_POST['gtid'])){
    include("aj_form_groupes.php");
}else {
    $mid=htmlspecialchars($_POST['mid']);
    $nom = htmlspecialchars($_POST['nom']);
    $annee =htmlspecialchars($_POST['annee']);
    $gtid = htmlspecialchars($_POST['gtid']);

    if(!is_numeric($annee)||!$annee>0 ){
        include("aj_form_groupes.php");
    }else{
        require("../db_config.php");
        try{
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO groupes VALUES (DEFAULT,?,?,?,?)";
            $st=$db->prepare($sql);
            $res = $st->execute(array($mid, $nom, $annee ,$gtid));

            if(!$res){
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../groupes/list_groupes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                <?php
                echo "<p><center><h2>Erreur d'ajout</h2></center></p>";

            }else{
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../groupes/list_groupes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                <?php
                echo "<p><center><h2>L'ajout à été effectué</h2></center></p>";
            }
            $db=null;
        }
        catch(PDOException $e){
            echo "Erreur de connexion: ". $e->getMessage() ;
        }
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
