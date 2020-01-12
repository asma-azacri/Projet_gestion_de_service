<?php

$page_title="Ajouter un module";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include("../header.php");

if($idm->getRole()=="admin"){

if(!isset($_POST['intitule'])|| !isset ($_POST['code']) || !isset ($_POST['eid'])|| !isset ($_POST['cid'])|| !isset ($_POST['annee']) ){
    include("aj_form_modules.php");
}else {
    $intitule = $_POST['intitule'];
    $code = $_POST['code'];
    $eid= $_POST['eid'];
    $cid= $_POST['cid'];
    $annee= $_POST['annee'];


    if( $intitule=="" || $code==""  || !is_numeric($annee)||!$annee>0 ){
        include("aj_form_modules.php");
    }else{
        require("../db_config.php");
        try{
            $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO modules VALUES (DEFAULT,?,?,?,?,?)";
            $st=$db->prepare($sql);
            $res = $st->execute(array( $intitule, $code,$eid,$cid,$annee));

            if(!$res){
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<p><center><h2>Erreur d'ajout</h2></center></p>";

            }else{
                echo "<br>";
                echo "<br>";
                echo "<br>";

                echo "<p><center><h2>L'ajout a été effectué</h2></center></p>";
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

