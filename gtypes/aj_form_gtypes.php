<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<br><br>

    <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

<div class="titre"><h3><center>Ajouter un gtype</center><h3></div>
<form action="ajout_gtypes.php" method="post">
    <table class="table  table-bordered">

        <tr><td>Nom</td><td><input type="text" name="nom" /></td></tr>
        <tr><td>Nbh</td><td><input type="number" name="nbh" /></td></tr>
        <tr><td>Coeff</td><td><input type="number" name="coeff" /></td></tr>
        <tr><td>Ajout</td><td><input type='submit' class="btn btn-primary " values="valider"  style="width:100%"/></td></tr>

    </table>
</form>
</div>
