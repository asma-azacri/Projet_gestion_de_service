<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<br>
<br>
<p> <a href='../utilisateurs/liste_user.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

<?php
                            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $reponse = $db->prepare("SELECT eid,nom,prenom,annee FROM enseignants ");
                            $reponse->execute();?>


    <div class="titre"><h3><center>modifications associations à un enseignants </center><h3></div>
         <form action="" method="post">
             <table class="table  table-bordered">
                <div class="form-group">
                      <tr><td>enseignants</td><td><select  name="eid"  class="form-control from-control-sm">
                            <?php
                              while($var=$reponse->fetch()){?>
                                  <option value=<?php echo  $var['eid'];?>>  <?php echo $var['nom']. " "; ?> <?php echo $var['prenom'] ." "; ?><?php echo "annee :" .$var['annee']; ?>
                                  </option>
                            <?php }?>
                            </select>
                    </div>

               <div class="form-group">
                    <tr><td>Modifier</td><td><center><button type='submit'  class="btn btn-primary " values="valider" style="width:100%"> valider</button></center></td></tr>
              </div>
            </table>
         </form>
    </div>

