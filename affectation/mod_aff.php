
<?php
     $page_title="Modifier un module";

     require_once("../trame_auth/auth/EtreAuthentifie.php");
      include("../header.php");
      if($idm->getRole()=="admin"){

     if (!isset($_GET['eid']) || !isset($_GET['gid']) || !isset($_GET['nbh'])){
          echo"erreur";

     }else {
          $eida = $_GET["eid"];
          $gida = $_GET["gid"];
          $nbha = $_GET["nbh"];
 
          require("../db_config.php");

          if (!isset($_POST['eid']) || !isset($_POST['gid']) || !isset($_POST['nbh'])){
               include("mod_form_aff.php");
          } else {
               $eid=htmlspecialchars($_POST['eid']);
               $gid=htmlspecialchars($_POST['gid']);
               $nbh=htmlspecialchars($_POST['nbh']);

               if ($eid=="" || $gid=="" ||!is_numeric($nbh)) {
                    include("mod_affectation_form.php");
               }else{
                    try {
                         $SQL = "UPDATE affectations SET eid=?, gid=?, nbh=? WHERE eid=? AND gid=?";
                         $st = $db->prepare($SQL);
                         $res = $st->execute(array($eid, $gid, $nbh, $eida, $gida));

                         if ($st->rowCount() ==0){
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
                              echo "<p><h2><center>La modification à été effectuée <center></h2></p>";
                              
                         }
  
            $db=null;
     }
 
     catch (PDOException $e){
          echo "Erreur SQL: ".$e->getMessage();
     }
 }
}
 
 }
 include("../footer.php");
}else{ 
     echo "<br>"  ;
     echo "<br>" ;
     echo "<br>";
     echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
   }
 
?>
