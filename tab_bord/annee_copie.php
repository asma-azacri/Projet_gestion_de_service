<?php

$page_title="copie année vers l'année en cours  ";

require_once("../trame_auth/auth/EtreAuthentifie.php");

include("../header.php");

if($idm->getRole()=="admin"){

        require("../db_config.php");
        $anneeact=$_SESSION['annee'];
        if (!isset($_GET["anneecopie"])) {
            include ("annee_copie_form.php");
         }else {
             $anneecopie= $_GET["anneecopie"];


        try{
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM   enseignants WHERE annee =  $anneecopie";
            $st=$db->prepare($sql);
            $res = $st->execute(array());

            foreach ($st as $row  ) {

                      $_SESSION['uid']=$row['uid'];
                       $_SESSION['nom']= $row['nom'];
                       $_SESSION['prenom']= $row['prenom'];
                       $_SESSION['email']= $row['email'];
                       $_SESSION['tel']= $row['tel'];
                       $_SESSION['etid']= $row['etid'];

                       $SQL = "INSERT INTO enseignants VALUES (DEFAULT, ?,?,?,?,?,?,?)";
                       $stt = $db->prepare($SQL);
                       $RES = $stt->execute(array($_SESSION['uid'], $_SESSION['nom'], $_SESSION['prenom'],$_SESSION['email'],$_SESSION['tel'],$_SESSION['etid'], $anneeact ));                    }

            if(!$RES){
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                <?php
                echo "<p><center><h2>Erreur de copie</h2></center></p>";

            }else{
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                <?php
                echo "<p><center><h2></h2></center></p>";

             }
            $db=null;
            }
    
        catch(PDOException $e){
            echo "Erreur de connexion: ". $e->getMessage() ;
        }

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $SQL = "SELECT * FROM modules WHERE annee =  $anneecopie";
            $st = $db->prepare($SQL);
            $st->execute(array());
            foreach ($st as $row){
               $_SESSION['intitule']= $row["intitule"];
               $_SESSION['code']= $row["code"];
               $_SESSION['eid']= $row["eid"];
               $_SESSION['cid']= $row["cid"];
     
                $SQLT = "INSERT INTO modules VALUES (DEFAULT, ?,?,?,?,?)";
                $stt = $db->prepare($SQLT);
                $result = $stt->execute(array($_SESSION['intitule'], $_SESSION['code'], $_SESSION['eid'],$_SESSION['cid'], $anneeact ));
        
            }
             if(!$result){
                echo "<br>";

                echo "<p><center><h2>Erreur de copie du modules</h2></center></p>";

            }else{
                echo "<p><center><h2> </h2></center></p>";
             }
            $db=null;
        }
    
        catch(PDOException $e){
            echo "Erreur de connexion: ". $e->getMessage() ;
        }

        try{
            $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql2 = "SELECT * FROM   groupes WHERE annee =  $anneecopie";
            $st2=$db->prepare($sql2);
            $res2 = $st2->execute(array());

            foreach ($st2 as $row  ) {

                      $_SESSION['mid']=$row['mid'];
                       $_SESSION['nom']= $row['nom'];
                       $_SESSION['gtid']= $row['gtid'];

                       $SQL1 = "INSERT INTO groupes VALUES (DEFAULT, ?,?,?,?)";
                       $stt1 = $db->prepare($SQL1);
                       $RES1 = $stt1->execute(array($_SESSION['mid'], $_SESSION['nom'], $anneeact, $_SESSION['gtid'] ));                    }

            if(!$RES1){
              
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
                <?php
                echo "<p><center><h2>Erreur de copie</h2></center></p>";
            }else{

                echo "<p><center><h2>la copie à été effectué</h2></center></p>";
             }
            $db=null;
            }
    
        catch(PDOException $e){
            echo "Erreur de connexion: ". $e->getMessage() ;
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
