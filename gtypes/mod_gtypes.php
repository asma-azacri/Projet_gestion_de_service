<?php
$page_title =" Modifier le gtype";


require_once("../trame_auth/auth/EtreAuthentifie.php");
include("../header.php");

if($idm->getRole()=="admin"){


if(!isset($_GET["gtid"])){
    include("mod_form_gtypes1.php");
}else{
        $gtid= $_GET["gtid"];
        require("../db_config.php");
        try{
        $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "SELECT * FROM gtypes WHERE gtid=:gtid";
        $st = $db->prepare($SQL);
        $st->execute(array('gtid'=>"$gtid"));
        foreach($st as $row){
            $nom=$row['nom'];
            $nbh=$row['nbh'];
            $coeff=$row['coeff'];

        }

        if($st->rowCount()==0){
            echo "<p>Erreur dans gtid </p>\n";
        }else if (!isset($_POST['nom']) || !isset($_POST['nbh']) || !isset($_POST['coeff'])){
            include("mod_form_gtypes.php");
        }else{
            $nom=$_POST['nom'];
            $nbh=$_POST['nbh'];
            $coeff=$_POST['coeff'];

            if($nom=="" || !is_numeric($nbh)||!is_numeric($coeff)){
               include("mod_form_gtypes.php");
            }else{

            $SQL = "UPDATE gtypes SET nom=?,nbh=?, coeff=? WHERE gtid=?";
            $st = $db->prepare($SQL);
            $res=$st->execute(array($nom,$nbh,$coeff,$gtid));
            if(!$res || $st->rowCount()==0){
                echo  "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../gtypes/list_gtypes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php

                echo "<p><h2><center>Erreur de modification</h2></center> </p>";
            }else{
                 echo  "<br>";
                 echo "<br>";
                 echo "<br>";
                 ?>
                 <p> <a href='../gtypes/list_gtypes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
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
   include ("../footer.php");
?>
