<?php

    require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
    <div class="container">
    <br>
    <br>
    <p> <a href='../affectation/list_affectation.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

    <div class="titre"><h3><center>Affectation d'un groupe à un enseignant</center></h3>  </div>

    <?php

        require("../db_config.php");
        $reponse = $db->prepare("SELECT g.nom ,m.intitule,g.gid  FROM `groupes` g ,`modules` m WHERE m.mid=g.mid AND g.annee=$_SESSION[annee]");
        $reponse->execute();

    ?>
     <?php
        require("../db_config.php");
        $execute = $db->prepare("SELECT nom ,eid FROM enseignants WHERE annee=$_SESSION[annee]");
        $execute->execute();

?>

    <form class="" method="post">
        <table class="table  table-bordered">
          
            <div class="form-group">
                <tr><td>groupe</td><td><select  name="groupe"  class="form-control from-control-sm">
                                <?php
                                      while($var=$reponse->fetch()){?>
                                       <option value="<?php echo  $var['gid'];?> " > <?php echo $var['nom']." ".$var['intitule']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>

            </div>
            <div class="form-group">
                <tr><td>enseignant</td><td><select  name="enseignant"  class="form-control from-control-sm">
                                <?php
                                      while($var=$execute->fetch()){?>
                                       <option value="<?php echo  $var['eid'];?> " > <?php echo $var['nom']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>

            </div>
            <div class="form-group">
            <tr><td>nbh</td><td><input type="number" name="nbh" /></td></tr>
            </div>
            <div class="form-group">
                <tr><td>Ajouter</td><td><button type="submit" class="btn btn-primary" value="valider" style="width:100%" >Ajouter</button ></td></tr>
            </div>
    </table>

</form>
</div>
