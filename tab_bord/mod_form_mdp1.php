<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<div class="titre"><h3><center>Modifier le mot de passe  de l'utilisateur</center><h3></div>
    <form action ="" method="get">
        <table class="table  table-bordered">
            <div class="form-group">
                <tr><td> uid </td><td><input type="number" name="uid"value="<?php  htmlspecialchars ($uid)?>"/></td></tr>
            </div>
            <div class="form-group">
                <tr><td> Modifier </td><td><button type='submit'  class="btn btn-primary " values="modifier"> modifier</button ></td></tr>
            </div>

        </table>
    </form>

</div>
