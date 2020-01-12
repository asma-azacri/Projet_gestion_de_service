<br>
<br>
<br>
<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<p> <a href='../gtypes/list_gtypes.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
<div class="container">
<div class="titre"><h3><center>Modifier le gtype</center><h3></div>
        <form action="" method="post">
            <table class="table  table-bordered">

        <div class="form-group">
            <tr><td>nom</td><td><input type="text" name="nom" value="<?php echo htmlspecialchars($nom);?>"/></td></tr>
        </div>

        <div class="form-group">
            <tr><td>Nbh</td><td><input type="number" name="nbh" value="<?php echo  htmlspecialchars($nbh)?>"/></td></tr>

        </div>

        <div class="form-group">
           <tr><td>Coeff</td><td><input type="number" name="coeff" value="<?php echo  htmlspecialchars($coeff) ?>"/></td></tr>

        </div>

        <div class="form-group">
            <tr><td> valider </td><td><button type='submit'  class="btn btn-primary " values="modifier" style="width:100%">valider</button ></td></tr>

        </div>


    </table>
</form>
</div>
