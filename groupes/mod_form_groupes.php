
<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<br>
<br>
<br>
<br>
<?php

require("../db_config.php");
$reponse = $db->prepare("SELECT gt.gtid ,gt.nom  FROM `gtypes` gt ");
$reponse->execute();

?>
<p> <a href='../groupes/list_groupes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
<div class="container">

<div class="titre"><h3><center>Modifier le groupe</center><h3></div>
        <form action="" method="post">
        <table class="table  table-bordered">
       
        <div class="form-group">
            <tr><td>nom</td><td><input type="text" name="nom" value="<?php htmlspecialchars($gtid) ;?>"/></td></tr>
        </div>
      
        <div class="form-group">
                <tr><td>gtid</td><td><select type="number" name="gtid"  class="form-control from-control-sm">
                                <?php
                                      while($var=$reponse->fetch()){?>
                                       <option value="<?php echo  $var['gtid'];?> " > <?php echo $var['nom']?>
                                       </option>
                                       <?php }?>
                
                </td></tr>

            </div>


        <div class="form-group">
            <tr><td>Annee</td><td><input type="number" name="annee" value="<?php htmlspecialchars($annee) ;?>"/></td></tr>
        </div>

        <div class="form-group">
            <tr><td>Modifier</td><td><button type='submit'  class="btn btn-primary " values="valider" style="width"> valider</button ></td></tr>
        </div>

    </table>
</form>
</div>
