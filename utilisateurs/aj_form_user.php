<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");

?> 
<div class="container">
<br><br>
<p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

<div class="titre"><h2><center> Ajouter un utilisateur</center></h2></div>
    <form action="ajout_user.php" method="post" >
        <table class="table  table-bordered">
            <thead>
                <tr><td>Login</td><td><input class ="form-control input-lg" type="text" placeholder="login" name="login" class="form-control"  /></td></tr>
                <tr><td>Mdp</td><td><input class ="form-control input-lg"  type="text"  placeholder="mot de passe"  name="mdp" class="form-control" /></td></tr>
                <tr><td>Mdp répéter</td><td><input class ="form-control input-lg"  type="text"  placeholder="mot de passe"  name="mdp2" class="form-control" /></td></tr>
                <tr><td>Role</td>
                <td><select class="input-field" id="inputRole" name="role" placeholder="role" required value="<?= $data['role']??""?>">
                                     <option value="user">User</option>
                                     <option value="admin">Admin</option>
                                </select>
                 <tr><td>Ajout</td><td><button type='submit'  class="btn btn-primary " values="valider"> valider</button ></td></tr>
            </thead>

         </table>
    </form>
</div>
