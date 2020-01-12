<?php
require_once("../trame_auth/auth/EtreAuthentifie.php");
 $page_title="Modifier un module";
 include("../header.php");



 if($idm->getRole()=="admin"){

 if (!isset($_GET["mid"])) {
    include("mod_form_modules1.php");
 }else {
$mid = $_GET["mid"];
     require("../db_config.php");
try {
         $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $SQL = "SELECT * FROM modules WHERE mid=:mid";
         $st = $db->prepare($SQL);
         $st->execute(array('mid'=>"$mid"));
         foreach ($st as $row){
            $intitule=$row['intitule'];
            $code=$row['code'];
            $eid=$row['eid'];
            $cid=$row['cid'];
            $annee=$row['annee'];
        }
         if ($st->rowCount() ==0) {
                echo "<p>Erreur dans l'eid</p>\n";
         } else if (!isset($_POST['intitule']) || !isset($_POST['code']) || !isset($_POST['eid']) || !isset($_POST['cid'])|| !isset($_POST['annee'])){
                include("mod_form_modules.php");
         } else {
                 $intitule=htmlspecialchars($_POST['intitule']);
                 $code=$_POST['code'];
                 $eid=htmlspecialchars($_POST['eid']);
                 $cid=htmlspecialchars($_POST['cid']);
                 $annee=htmlspecialchars($_POST['annee']);

             if ($intitule=="" || $code=="" || !is_numeric($eid) || !is_numeric($cid)||!is_numeric($annee)    ) {
                 include("mod_form_modules.php");
             }else{

                 $SQL = "UPDATE modules SET intitule=?, code=?, eid=?, cid=? , annee=? WHERE mid=? ";
                 $st = $db->prepare($SQL);
                 $res = $st->execute(array($intitule, $code, $eid, $cid, $annee, $mid));
            
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
                    echo "<p><center><h2>La modification à été effectuée</h2></center></p>";                 }
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
