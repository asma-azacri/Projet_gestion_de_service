<?php
require_once("auth/EtreAuthentifie.php");
include("../header.php");
include("../db_config.php");

if($idm->getRole()=="admin"){

if (empty($_POST['login'])) {
    include('adduser_form.php');
    exit();
}

$error = "";

foreach (['nom', 'prenom', 'email', 'tel','annee','etid','login', 'mdp', 'mdp2'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide";
    } else {
        $data[$name] = htmlspecialchars($_POST[$name]);
    }
}

// Vérification si l'utilisateur existe
$db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "SELECT uid FROM users WHERE login=?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['login']]);

if ($res && $stmt->fetch()) {
    $error .= "Login déjà utilisé";
}

if ($data['mdp'] != $data['mdp2']) {
    $error .="MDP ne correspondent pas";
}




foreach (['login', 'mdp'] as $name) {
    $clearData[$name] = $data[$name];
}

$passwordFunction =
    function ($s) {
        return password_hash($s, PASSWORD_DEFAULT);
    };

$clearData['mdp'] = $passwordFunction($data['mdp']);

try {
    $SQL = "INSERT INTO users(login,mdp) VALUES (:login,:mdp)";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute($clearData);
    

    $sql = "SELECT max(uid) FROM users";
    $res=$db->query($sql) ;

    if($res->rowCount()==0){
         echo"<p>no uid </p>";
    }else{
        foreach($res as $row) {   
            $uid= $row["max(uid)"];
         }
        $SQLE="INSERT INTO enseignants VALUES (DEFAULT,?,?,?,? ,?,?,?)";

   $st = $db->prepare($SQLE);
        $res = $st->execute(array($uid,$data['nom'],$data['prenom'],$data['email'],$data['tel'],$data['etid'],$data['annee']));
  
        if(!$res){
            echo "<br>";
            echo "<br>";
            echo "<br>";
            ?>
            <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
           <?php
            echo "<p><center><h2>Erreur d'ajouter</h2></center></p>";
        }else{
            echo "<br>";
            echo "<br>";
            echo "<br>";
            ?>
            <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
           <?php
            echo "<p><center><h2>L'ajout à été effectué</h2></center></p>";
       
        }
   }
    

} catch (PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
}

}else{ 
    echo "<br>"  ;
    echo "<br>" ;
    echo "<br>";
    echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
  }
include ("../footer.php");
?>



