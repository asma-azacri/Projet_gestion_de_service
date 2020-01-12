<?php

require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<br>
<br>

<div class="titre"><h3><center>Modifier un gtype</center><h3></div>
<form action ="" method="get">
    <table class="table  table-bordered">

        <div class="form-group">
            <tr><td> gtid </td><td><input type="number" name="gtid"value="<?php echo $gtid?>"/></td></tr>
        </div>

            <div class="form-group">
                <tr><td> Modifier </td><td><button type='submit'  class="btn btn-primary " values="modifier"> modifier</button ></td></tr>
            </div>
    </table>

</form>
