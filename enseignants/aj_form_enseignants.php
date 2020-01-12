<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<br>
<br>
<br>

<p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

<div class="titre"><h3><center>Ajouter un enseignant</center></h3>  </div>
<div class="container">
<br>

<?php
   
  $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $execute = $db->prepare("SELECT e.eid,u.login,e.nom,e.prenom,e.email,e.tel,et.nom as type  FROM `enseignants` e ,`etypes` et ,`users` u WHERE e.etid=et.etid AND u.uid=e.uid");
  $execute->execute();
?>

<form class="" method="post">
  <table class="table  table-bordered">
     <div class="form-group">
        <tr><td>enseignant</td><td><select  name="eid"  class="form-control from-control-sm">
            <?php
                while($var=$execute->fetch()){?>
                   <option value="<?php echo  $var['eid'];?>" > <?php echo  $var['login']."  ";?> <?php echo  $var['nom']."  ";?> <?php echo  $var['prenom']." 
                   ";?> <?php echo  $var['email']." ";?> <?php echo  $var['tel']." ";?> <?php echo  $var['type']." ";?> 
                   </option>
               <?php }?>
        </td></tr>

    </div>
            <div class="form-group">
                <tr><td>Ajouter</td><td><button type="submit" class="btn btn-primary" value="valider" style="width:100%" >Ajouter</button ></td></tr>
            </div>

            <div class="form-group">
                 
                <tr><td>inscrire un nouveau enseignant</td><td><input type="button"  class="btn btn-primary" value="inscrire" style="width:100%" onclick="document.location.href='../trame_auth/adduser.php'" /></td></tr>
            </div>

    </table>

</form>
</div>