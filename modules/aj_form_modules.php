<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<br><br>
<br>

<p> <a href='../modules/list_modules.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

<div class="container">
<?php

require("../db_config.php");
$reponse = $db->prepare("SELECT * FROM enseignants WHERE annee=$_SESSION[annee]");
$reponse->execute();

?>
<?php
require("../db_config.php");
$execute = $db->prepare("SELECT * FROM categories ");
$execute->execute();

?>

<div class="titre"><h3><center>Ajouter un module</center><h3></div>
    <form action="ajout_modules.php" method="post">
        <table class="table  table-bordered">
            <div class="form-group">
                <tr><td>Intitule</td><td><input type="text" name="intitule" /></td></tr>
            </div>
            <div class="form-group">
                <tr><td>Code</td><td><input type="text" name="code" /></td></tr>
            </div>
            <div class="form-group">


            <div class="form-group">
                <tr><td>Enseignants</td><td><select  name="eid"  class="form-control from-control-sm">
                                <?php
                                      while($var=$reponse->fetch()){?>
                                       <option value="<?php echo  $var['eid'];?> " > <?php echo $var['nom']."".$var['prenom']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>
             </div>
            <div class="form-group">
                <tr><td>categories </td><td><select  name="cid"  class="form-control from-control-sm">
                                <?php
                                      while($var=$execute->fetch()){?>
                                       <option value="<?php echo  $var['cid'];?> " > <?php echo $var['nom']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>
            </div>
            <div class="form-group">
                <tr><td>Annee</td><td><input type="number" name="annee" /></td></tr>
            </div>
            <div class="form-group">
                <tr><td>Ajouter</td><td><button type="submit" class="btn btn-primary" value="valider" style="width:100%" >Ajouter</button ></td></tr>
            </div>
   
        </table>
    </form>
</div>
