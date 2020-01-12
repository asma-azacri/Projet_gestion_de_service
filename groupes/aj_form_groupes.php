<?php

    require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
    <div class="container">
    <br>
    <br>
    <p> <a href='../groupes/list_groupes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

    <div class="titre"><h3><center>Ajouter un groupe</center><h3></div>

    <?php

        require("../db_config.php");
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $reponse = $db->prepare("SELECT intitule,mid FROM modules WHERE annee=$_SESSION[annee]");
        $reponse->execute();

    ?>
     <?php
        require("../db_config.php");
        $execute = $db->prepare("SELECT gtid ,nom FROM gtypes ");
        $execute->execute();

    ?>

    <form class="" method="post">
        <table class="table  table-bordered">
          
            <div class="form-group">
                <tr><td>module</td><td><select  name="mid"  class="form-control from-control-sm">
                                <?php
                                      while($var=$reponse->fetch()){?>
                                       <option value="<?php echo  $var['mid'];?> " > <?php echo $var['intitule']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>

            </div>
            <div class="form-group">
                 <tr><td>Nom de groupe </td><td><input type="text" name="nom" /></td></tr>
           </div>
           <div class="form-group">
              <tr><td>Annee</td><td><input type="number" name="annee" /></td></tr>
           </div>
  
           <div class="form-group">
                <tr><td>le type de groupe</td><td><select  name="gtid"  class="form-control from-control-sm">
                                <?php
                                      while($var=$execute->fetch()){?>
                                       <option value="<?php echo  $var['gtid'];?> " > <?php echo $var['nom']; ?>
                                       </option>
                                       <?php }?>
                
                </td></tr>
         </div>
            

            <div class="form-group">
                <tr><td>Ajouter</td><td><button type="submit" class="btn btn-primary" value="valider" style="width:100%" >Ajouter</button ></td></tr>
            </div>
   


</form>
</div>
