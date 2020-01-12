  
 <?php
include("../header.php");
require_once("../trame_auth/auth/EtreAuthentifie.php");
?>
       <div class="container">
    <br>
    <br>
    <p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>

    <div class="titre"><h3><center>copier l'année</center></h3>  </div>

<form action="" method="get">

<table class="table  table-bordered">
            
                <div class="form-group">
                    <tr><td>annee</td><td><input type="password" name="anneecopie" ></td></tr>
                </div>

                <div class="form-group">

                <tr><td>copier</td><td><button type="submit" class="btn btn-primary" value="valider" style="width:100%" >copier</button ></td></tr>


</div>
</table>
</form>
<?php
include("../footer.php");
?>

