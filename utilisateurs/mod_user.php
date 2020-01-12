<?php
$page_title =" Modifier le mdp de l'utilisateu";


require_once("../trame_auth/auth/EtreAuthentifie.php");
include("../header.php");
if($idm->getRole()=="admin"){

if(!isset($_GET["uid"])){
    include("mod_form_user1.php");
}else{
    $uid= $_GET["uid"];
    require("../db_config.php");
        try{
            $SQL = "SELECT mdp FROM users WHERE uid=:uid";
            $st = $db->prepare($SQL);
            $st->execute(array('uid'=>"$uid"));
       
            if($st->rowCount()==0){
                echo "<p>Erreur dans uid </p>\n";
            }else if (!isset($_POST['mdp'])){
                 include("mod_form_user.php");
            }else{
                 $mdp=htmlspecialchars($_POST['mdp']);
                 if($mdp=="" ){
                    include("mod_form_user.php");
                 }else{
                    $SQL = "UPDATE users SET mdp=? WHERE uid=?";
                    $st = $db->prepare($SQL);
                    $res=$st->execute(array(password_hash($mdp, PASSWORD_DEFAULT),$uid));
                    if(!$res || $st->rowCount()==0){
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
                         echo "<p><h2><center>La modification de mots de passe  à été effectuée <center></h2></p>";

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
