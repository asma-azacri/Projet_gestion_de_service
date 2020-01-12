<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<br>
<br>
<p> <a href='../utilisateurs/liste_user.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

    <div class="titre"><h3><center>Modifier le mot de passe  de l'utilisateur</center><h3></div>
         <form action="" method="post">
             <table class="table  table-bordered">
                <div class="form-group">
                    <tr><td>Mot de passe</td><td><input type="password" name="mdp" ></td></tr>
                </div>

               <div class="form-group">
                    <tr><td>Modifier</td><td><center><button type='submit'  class="btn btn-primary " values="valider" style="width:100%"> valider</button></center></td></tr>
              </div>
            </table>
         </form>
    </div>

