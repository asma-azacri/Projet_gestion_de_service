<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<br> <br>
<br>
<p> <a href='../affectation/list_affectation.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

    <div class="titre"><h3><center>Modifier l'affectation</center><h3></div>
         <form action="" method="post">
             <table class="table  table-bordered">
                 <tr><td>enseignant</td><td><select  name="eid"  class="form-control from-control-sm">
                      <?php
                          $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $reponse = $db->prepare("SELECT eid,nom,prenom FROM enseignants WHERE annee=$_SESSION[annee]");
                            $reponse->execute();
                            while($var=$reponse->fetch()){?>
                                  <option value=<?php echo  $var['eid'];?>> <?php echo $var['nom']; ?> <?php echo $var['prenom']; ?>
                                  </option>
                    <?php }?>
                 </td></tr>

                 <tr><td>groupe</td><td><select  name="gid"  class="form-control from-control-sm">
                      <?php
                            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $reponse = $db->prepare("SELECT gid,nom FROM groupes WHERE annee=$_SESSION[annee]");
                            $reponse->execute();
                            while($var=$reponse->fetch()){?>
                                    <option value=<?php echo  $var['gid'];?>><?php echo  $var['gid'];?>  <?php echo $var['nom']; ?>
                                    </option>
                         <?php }?>
                 </td></tr>
                  <tr><td>nbh</td><td><input type="number" name="nbh" value="<?php echo $nbhn ?>"/></td></tr>
             <div class="form-group">
                <tr><td>Modifier</td><td><button type="submit" class="btn btn-primary" value="valider" >Modifier</button ></td></tr>
            </div>
    </table>
</form>
</div>
</div>
