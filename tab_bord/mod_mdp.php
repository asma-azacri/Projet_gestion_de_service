<?php
$page_title =" Modifier le mdp de l'utilisateu";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include("../header.php");

if(!isset($_GET["uid"])){
    include("mod_form_mdp1.php");
}else{
        $uid= $_GET["uid"];
        require("../db_config.php");
        try{
        $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "SELECT mdp FROM users WHERE uid=:uid";
        $st = $db->prepare($SQL);
        $st->execute(array('uid'=>"$uid"));
         
        foreach($st as $row){
           $mdp=$row['mdp'];
        }

        if($st->rowCount()==0){
            echo "<p>Erreur dans uid </p>\n";
        }else if (!isset($_POST['amdp'])||!isset($_POST['nmdp']) ||!isset($_POST['vmdp'])){
            include("mod_form_mdp.php");

        }else{
            
            $amdp=htmlspecialchars($_POST['amdp']);     
            $nmdp=htmlspecialchars($_POST['nmdp']);
            $vmdp=htmlspecialchars($_POST['vmdp']);
                       if($amdp=="" ||$nmdp=="" || $vmdp==""){
               include("mod_form_mdp.php");
            }else{
              
                $hachamdp=password_hash($amdp, PASSWORD_DEFAULT);
               if ($mdp=$hachamdp){
                    if($nmdp==$vmdp){

                          $SQL = "UPDATE users SET mdp=? WHERE uid=?";
                          $st = $db->prepare($SQL);
                          
                          $res=$st->execute(array(password_hash($nmdp, PASSWORD_DEFAULT),$uid));
                          if(!$res || $st->rowCount()==0){
                                 echo  "<br>";
                                 echo "<br>";
                                 echo "<br>";
                                 if($idm->getRole()=="admin"){   
                                    ?>
                                     <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                                    <?php
                                 }else{
                                    ?>
                                    <p> <a href='../trame_auth/home_users.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                                   <?php

                                 }
                                 echo "<p><h2><center>Erreur de modification</h2></center> </p>";
                         }else{
                                 echo  "<br>";
                                 echo "<br>";
                                 echo "<br>";
                                 if($idm->getRole()=="admin"){   
                                    ?>
                                     <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                                    <?php
                                 }else{
                                    ?>
                                    <p> <a href='../trame_auth/home_users.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                                   <?php

                                 }
                                 echo "<p><h2><center>La modification de mots de passe  à été effectuée <center></h2></p>";

                         }
                      }
                }
            }
        }
         $db=null;
        }catch(PDOException $e){
                echo "Erreur SQL :".$e->getMessage();
            }
        }
include("../footer.php");

?>
