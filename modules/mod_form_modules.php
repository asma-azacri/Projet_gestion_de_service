
 <?php
require_once("../trame_auth/auth/EtreAuthentifie.php");
?> 
<div class="container">
<br><br>
<p> <a href='../modules/list_modules.php'> <img style="height:40px" src="../image/backhome.png">Accueil</a></p>
    
<div class="titre"><h3><center>Modifier un module</center><h3></div>
    <form action="" method="post">
        <table class="table  table-bordered">   

        <div class="form-group">
              <tr><td>intitule</td><td><input type="text" name="intitule" value="<?php echo htmlspecialchars($intitule);?>"/></td></tr>
         </div>

         <div class="form-group">
             <tr><td>code</td><td><input type="text" name="code" value="<?php echo htmlspecialchars($code);?>"/></td></tr>
         </div>

        <div class="form-group">
             <tr><td>enseignant</td><td><select  name="eid"  class="form-control from-control-sm">

             <?php
               $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
               $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $reponse = $db->prepare(" SELECT e.nom,e.prenom ,c.nom as categories ,m.eid FROM `modules` m,`enseignants`e ,`categories` c  WHERE e.eid=m.eid AND c.cid=m.cid  AND m.annee=$_SESSION[annee] ");
                 $reponse->execute();
                    while($var=$reponse->fetch()){?>
                   <option value=<?php echo  $var['eid'];?>><?php echo  $var['eid'];?>  <?php echo $var['nom']; ?> <?php echo $var['prenom']; ?>
                   </option>
               <?php }?>
           </td></tr>
        </div>

        <div class="form-group">
           <tr><td>categorie</td><td><select class="input-field" id="inputType" type="number" name="cid" value="<?php echo $cid ?>">
                                     <option value="1">Licence 1 Informatique</option>
                                     <option value="2">Licence 2 Informatique</option>
                                     <option value="3">Licence 3 Informatique</option>
                                </select>

         </td></tr>
         </div>

         <div class="form-group">
         <tr><td>annee</td><td><input type="number" name="annee" value="<?php echo $annee ?>"/></td></tr>
    </div>
    <div class="form-group">
                <tr><td> valider </td><td><button type='submit'  class="btn btn-primary " values="modifier" style="width:100%"> modifier</button ></td></tr>
            </div>
 </table>
        
   

</form>