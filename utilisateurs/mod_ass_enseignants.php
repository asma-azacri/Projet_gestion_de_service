<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
 $page_title="Modifications associations à un enseignants";
 include("../header.php");
 if($idm->getRole()=="admin"){

 if (!isset($_GET["uid"])) {
    include("mod_form_ass_enseignants.php");
 }else {
    $uid=$_GET['uid'];
 

     require("../db_config.php");
try {
         $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $SQL = "SELECT * FROM users WHERE uid=:uid";
         $st = $db->prepare($SQL);
         $st->execute(array('uid'=>"$uid"));
         foreach ($st as $row){
            $uid=$row['uid'];    
        }
         if ($st->rowCount() ==0) {
                echo "<p>Erreur dans l'uid</p>\n";
         } else if ( !isset($_POST['eid'])){
            include("mod_form_ass_enseignants.php");

         } else {
                 $eid=$_POST['eid'];

             if ( !is_numeric($eid)   ) {
                include("mod_form_ass_enseignants.php");

            }else{

                 $SQL = "UPDATE enseignants SET uid=? WHERE eid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array($uid,$eid));
            
                 if (!$res){
                    echo " <br>";
                    echo  "<br>";
                    echo " <br>";
                    ?>
                    <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                   <?php
                    echo "<p><center><h2>Erreur de modification</h2></center></p>";
                 }else{
                    echo " <br>";
                    echo  "<br>";
                    echo " <br>";
                    ?>
                    <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                   <?php
                    echo "<p><center><h2>La modification à été efectuée</h2></center></p>";                 }
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

 include ("../footer.php");

?>
