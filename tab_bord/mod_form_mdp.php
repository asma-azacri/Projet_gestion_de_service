<br><br><br>

<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
if($idm->getRole()=="admin"){   
    ?>
     <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
    <?php
 }else{
    ?>
    <p> <a href='../trame_auth/home_users.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
   <?php
 }
?> 
<div class="container">

    <div class="titre"><h3><center>Modifier le mot de passe  de l'utilisateur</center><h3></div>
    <form action="" method="post">
    <table class="table  table-bordered">
  
        <div class="form-group">
            <tr><td>Mot de passe actuel</td><td><input type="password" name="amdp" ></td></tr>
        </div>

        <div class="form-group">
            <tr><td> Nouveau mot de passe </td><td><input type="password" name="nmdp" ></td></tr>
        </div>

        <div class="form-group">
            <tr><td> Verification Mot de passe </td><td><input type="password" name="vmdp" ></td></tr>
        </div>

        <div class="form-group">
            <tr><td>Modifier</td><td><center><button type='submit'  class="btn btn-primary " values="valider" style="width:100%"> valider</button></center></td></tr>
         </div>
    </table>

    </form>
</div>

