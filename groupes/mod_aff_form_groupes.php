<?php

    require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<br>
<br>
<p> <a href='../groupes/list_groupes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

<div class="titre"><h3><center>Modification de l'affectation à un module</center></h3>  </div>

<?php
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $reponse = $db->prepare("SELECT intitule,mid FROM modules WHERE annee=$_SESSION[annee]");
     $reponse->execute();

?>

<form class="" method="post">
    <table class="table  table-bordered">
          

            <div class="form-group">
                <tr><td>mid</td><td><select  name="mid"  class="form-control from-control-sm">
                                <?php
                                      while($var=$reponse->fetch()){?>
                                       <option value="<?php echo  $var['mid'];?> " > <?php echo $var['intitule']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>

            </div>

            <div class="form-group">
                <tr><td>Modifier</td><td><button type="submit" class="btn btn-primary" value="valider" >Modifier</button ></td></tr>
            </div>
    </table>

</form>
</div>
