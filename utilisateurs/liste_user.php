
<?php
     $page_title= "liste des utilisateurs";
     require_once("../trame_auth/auth/EtreAuthentifie.php");

     include( "../db_config.php");
     include("../header.php");
     if($idm->getRole()=="admin"){

?>

     <body>
           <br /><br />
           <div class="container">
           <h3 align="center">Liste des utilisateurs</h3>
            <br />
               <div class="table-responsive" >
                    <table id="employee_data" class="table table-striped table-bordered" >
                         <thead>
                              <tr >
                                    <td>uid</td>
                                    <td>login</td>
                                    <td>role</td>
                                    <td>modifier mot de passe </td>
                                    <td>association</td>

                                    <td>supprimer</td>
                               </tr>
                          </thead>


<?php
     $page_title= "liste des enseignants";
     include( "../db_config.php");
     try {
          $sql = "SELECT * FROM users ";
          $st = $db->query($sql);


          foreach ($st as $row  ) {
                echo "<tr>";
                     echo "<td>$row[uid]</a></td>";
                     echo "<td>$row[login]</a></td>";
                     echo "<td>$row[role]</a></td>";
                     echo "<td><a href=\"mod_user.php?uid=$row[uid]\"><img style=height:30px src=../image/mod.png></td>";
                     
                     echo "<td><a href=\"mod_ass_enseignants.php?uid=$row[uid]\"><img style=height:30px src=../image/mod.png></td>";

                     echo "<td><a href=\"sup_user.php?uid=$row[uid]\"><img style=height:30px src=../image/sup.jpg></a></td>";   
               echo "</tr>";
    }

    $db=null;
   }

catch(PDOException $e)
   {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
?>
<p> <a href='../trame_auth/home_admin.php'> <img style="height:40px" src="../image/backhome.png">Accueil<a></p>

<?php

}else{ 
     echo "<br>"  ;
     echo "<br>" ;
     echo "<br>";
     echo " <p> <h2><center>vous avez pas le droit d'accéder  à cette page</center></h2></p>";
   }
   include ("../footer.php");

?>

<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  

