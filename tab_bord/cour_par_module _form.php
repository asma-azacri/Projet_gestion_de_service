<?php

    require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
    <div class="container">
    <br>
    <br>
    <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

    <div class="titre"><h3><center>cours de chaque module</center></h3>  </div>

   
     <?php
        require("../db_config.php");
        $execute = $db->prepare("SELECT mid,intitule FROM modules WHERE annee=$_SESSION[annee]");
        $execute->execute();

      ?>

    <form class="" method="post">
        <table class="table  table-bordered">
            <div class="form-group">
                <tr><td>groupe</td><td><select  name="mid"  class="form-control from-control-sm">
                                <?php
                                      while($var=$execute->fetch()){?>
                                       <option value="<?php echo  $var['mid'];?> " > <?php echo $var['intitule']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>

          
                <tr><td>confirmer</td><td><button type="submit" class="btn btn-primary" value="valider" style="width:100%" >confirmer</button ></td></tr>
            </div>
    </table>

</form>
</div>
