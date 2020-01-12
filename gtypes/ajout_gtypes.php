<?php

$page_title="Ajouter un gtype ";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include("../header.php");

if($idm->getRole()=="admin"){


if(!isset($_POST['nom'])|| !isset ($_POST['nbh']) || !isset ($_POST['coeff'])){
    include("aj_form_gtypes.php");
}else {
    $nom = htmlspecialchars($_POST['nom']);
    $nbh =htmlspecialchars( $_POST['nbh']);
    $coeff= htmlspecialchars($_POST['coeff']);

    if($nom=="" || !is_numeric($nbh) || !is_numeric($coeff)){
        include("aj_form_gtypes.php");
    }else{
        require("../db_config.php");
        try{
            $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO gtypes VALUES (DEFAULT,?,?,?)";
            $st=$db->prepare($sql);
            $res = $st->execute(array($nom, $nbh, $coeff));

            if(!$res){

                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php
                echo "<p><center><h2>Erreur d'ajout</h2></center></p>";

            }else{
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
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
