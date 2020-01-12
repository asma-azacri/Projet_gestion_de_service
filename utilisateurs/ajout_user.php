<?php
    $page_title="Ajouter un utilisateur ";
    
    require_once("../trame_auth/auth/EtreAuthentifie.php");

    include("../header.php");
    if($idm->getRole()=="admin"){


    if (empty($_POST['login'])) {
        include('aj_form_user.php');
        exit();
    }

    $error = "";

    foreach (['login', 'mdp', 'mdp2', 'role'] as $name) {
        if (empty($_POST[$name])) {
            $error .= "La valeur du champs '$name' ne doit pas être vide";
         } else {
            $data[$name] = $_POST[$name];
         }
    }

    require "../db_config.php";
   
// Vérification si l'utilisateur existe
    $SQL = "SELECT uid FROM users WHERE login=?";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute([$data['login']]);

    if ($res && $stmt->fetch()) {
        $error .= "Login déjà utilisé";
        echo"Login déjà utilisé";
    }

    if ($data['mdp'] != $data['mdp2']) {
        $error .="MDP ne correspondent pas";
        echo"mdp ne correspondent pas";
    }

    if (!empty($error)) {
        include('aj_form_user.php');
        exit();
    }   

    foreach (['login', 'mdp' , 'role'] as $name) {
        $clearData[$name] = $data[$name];
    }

    $passwordFunction =
        function ($s) {
            return password_hash($s, PASSWORD_DEFAULT);
         };

    $clearData['mdp'] = $passwordFunction($data['mdp']);
        try{
            $sql = "INSERT INTO users(login,mdp,role) VALUES (:login,:mdp, :role)";

            $st = $db->prepare($sql);
            $res = $st->execute($clearData);
            $uid = $db->lastInsertId();
     
            if(!$res){
                echo  "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php
                echo "<p><h2><center>Erreur de ajouter </h2></center> </p>";
            }else{
                echo  "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
               <?php
                 echo "<p><h2><center>La ajouter à été efectuée <center></h2></p>";
            }
            $db=null;
        }
        catch(PDOException $e){
            echo "Erreur de connexion: ". $e->getMessage() ;
        }

include ("../footer.php");
}else{ 
    echo "<br>"  ;
    echo "<br>" ;
    echo "<br>";
    echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
  }
?>
