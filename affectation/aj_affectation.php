<?php

$page_title="Ajouter un affectation ";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include("../header.php");

if($idm->getRole()=="admin"){

if(!isset($_POST['enseignant'])|| !isset ($_POST['groupe']) || !isset ($_POST['nbh'])){
    include("aj_form_affectation.php");
}else {
    $groupe = htmlspecialchars($_POST['groupe']);
    $enseignant= htmlspecialchars($_POST['enseignant']);
    $nbh =htmlspecialchars( $_POST['nbh']);


    if($groupe==" " || $enseignant==" "|| !is_numeric($nbh) ){

        include("aj_form_affectation.php");
    }else{
        require("../db_config.php");
        try{
            $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO affectations VALUES (?,?,?)";
            $st=$db->prepare($sql);
            $res = $st->execute(array($enseignant, $groupe, $nbh));

            if(!$res){

                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../affectation/list_affectation.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                <?php
                echo "<p><center><h2>Erreur d'ajout</h2></center></p>";

            }else{
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../affectation/list_affectation.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
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

include ("../footer.php");
}else{ 
    echo "<br>"  ;
    echo "<br>" ;
    echo "<br>";
    echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
  }

?>
