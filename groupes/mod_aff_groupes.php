<?php
$page_title =" Modification de l'affectation à un module ";

require("../trame_auth/auth/EtreAuthentifie.php");
include("../header.php");

if($idm->getRole()=="admin"){

if(!isset($_GET["gid"])){
    include("mod_aff_form_groupes1.php");
}else{
        $gid= htmlspecialchars($_GET["gid"]);
        require("../db_config.php");
        try{

        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "SELECT mid FROM groupes where gid=:gid ";
        $st = $db->prepare($SQL);
        $st->execute(array('gid'=>$gid));
        foreach($st as $row){
             $mid=$row['mid'];
             
        }
        if($st->rowCount()==0){
            echo "<p>Erreur dans gid </p>\n";
        }else if (!isset($_POST['mid'])){
            include("mod_aff_form_groupes.php");
            exit();
        }
            if(isset($_POST['mid'])){
                $SQL = "UPDATE groupes SET mid=? WHERE gid=?";
                $st = $db->prepare($SQL);
                $res=$st->execute(array(htmlspecialchars($_POST['mid']),$gid));
                if(!$res){
                    echo "<br>"  ;
                    echo "<br>" ;
                    echo "<br>";
                    echo "<p><center><h2>Erreur de modification</h2></center></p>";

                }else{ 
                    echo "<br>"  ;
                    echo "<br>" ;
                    echo "<br>";
                    echo "<p><center><h2>La modification à été efectuée</h2></center></p>";

                }
            
            $db=null;
            }
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

