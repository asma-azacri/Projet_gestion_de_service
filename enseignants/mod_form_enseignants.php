<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<br>
<br>
<br>
<p> <a href='../enseignants/list_enseignants.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

<div class="titre"><center><h1>Modifier un enseignant</center></h1>
</div>
<form action="" method="post">
    <table class="table  table-bordered">

        <tr><td>Nom</td><td><input type="text" name="nom" value="<?php echo htmlspecialchars ($nom);?>"/></td></tr>
        <tr><td>Prenom</td><td><input type="text" name="prenom" value="<?php echo htmlspecialchars ($prenom);?>"/></td></tr>
        <tr><td>Email</td><td><input type="email" name="email" value="<?php echo htmlspecialchars ($email);?>"/></td></tr>
        <tr><td>Tel</td><td><input type="number" name="tel" value="<?php echo $tel ?>"/></td></tr>
        
        <div class="form-group">
                <tr><td>type de prof</td><td><select  name="etid"  class="form-control from-control-sm">
                                <?php
                                    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $reponse = $db->prepare("SELECT etid,nom FROM etypes");
                                    $reponse->execute();
                                      while($var=$reponse->fetch()){?>
                                            <option value="<?php echo  $var['etid'];?> " > <?php echo $var['nom']; ?>
                                            </option>
                                       <?php }?>
                </td></tr>

            </div>

        <tr><td>Annee</td><td><input type="number" name="annee" value="<?php echo $annee?>"/></td></tr>
        <tr><td>valider</td><td><center><button type="submit"  class="btn btn-primary" value="valider" style="width:100%">valider</button ></center></td></tr>


    </table>
</form>
</div>
