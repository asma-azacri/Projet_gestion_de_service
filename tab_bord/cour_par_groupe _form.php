<?php

    require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
    <div class="container">
    <br>
    <br>
    <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

    <div class="titre"><h3><center>cours</center></h3>  </div>

   
     <?php
        require("../db_config.php");
        $execute = $db->prepare("SELECT g.nom ,g.gid ,m.intitule FROM `groupes` g,`modules` m WHERE g.mid=m.mid AND m.annee=$_SESSION[annee]");
        $execute->execute();

      ?>

    <form class="" method="post">
        <table class="table  table-bordered">
          
           
            <div class="form-group">
                <tr><td>groupe</td><td><select  name="gid"  class="form-control from-control-sm">
                                <?php
                                      while($var=$execute->fetch()){?>
                                       <option value="<?php echo  $var['gid'];?> " > <?php echo $var['nom']."". $var['intitule']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>

          
                <tr><td>confirmer</td><td><button type="submit" class="btn btn-primary" value="valider" style="width:100%" >confirmer</button ></td></tr>
            </div>
    </table>

</form>
</div>
