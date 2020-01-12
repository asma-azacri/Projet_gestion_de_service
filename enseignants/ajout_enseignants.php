
<?php
$page_title ="Ajouter un enseignant";

require("../trame_auth/auth/EtreAuthentifie.php");
include("../header.php");

if($idm->getRole()=="admin"){
if (!isset($_POST['eid'])){
   include("aj_form_enseignants.php");
   exit();
}
if(isset($_POST['eid'])){
	require "../db_config.php";
           try {
			    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $SQL = "SELECT uid , nom , prenom , email , tel , etid FROM enseignants WHERE eid=?";
                $st = $db->prepare($SQL);
                $res=$st->execute(array(htmlspecialchars($_POST['eid'])));
				if($st->rowCount()==0)
		                echo"<p>probleme select";
				else{
					foreach($st as $row) {
						$uid= htmlspecialchars($row["uid"]);
						$nom= htmlspecialchars($row["nom"]);
						$prenom= htmlspecialchars($row["prenom"]);
						$email= htmlspecialchars($row["email"]);
						$tel= htmlspecialchars($row["tel"]);
						$etid= htmlspecialchars($row["etid"]);				
                       }
				}
				 echo"<tr>";
			  echo"<td>$uid</a></td>";
			  echo"<td>$nom</a></td>";
			  echo"<td>$prenom</a></td>";
			  echo"<td>$email</a></td>";
			  echo"</tr>";
			
            
            
			    $SQLT="INSERT INTO enseignants VALUES (DEFAULT,?,?,?,? ,?,?,?)";
				$st = $db->prepare($SQLT);
                $res = $st->execute(array($uid,$nom,$prenom,$email,$tel,$etid,$_SESSION["annee"]));
                if(!$res){
					echo "<br>";
					echo "<br>";
					echo "<br>";
					?>
					<p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
				   <?php
                    echo "<p><h2><center>Erreur d'ajout </center></h2></p>";
                }else{ 
					echo "<br>";
					echo "<br>";
					echo "<br>";
					?>
					<p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
				   <?php
                    echo "<p><h2><center>L'ajout a été effectué</center></h2></p>";

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
