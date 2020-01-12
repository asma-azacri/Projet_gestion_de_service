

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require_once("../trame_auth/auth/EtreAuthentifie.php");
include("../header.php");
 ?>
<div class="container">

<br/>
<br/>
<br/>
<br/>
  <h2>Ajax Update</h2>
  <p>Update user info with Jquery Ajax:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Login</th>
        <th>modifier</th>
       
      </tr>
    </thead>
    <tbody>
      <?php


    
     include( "../db_config.php");
     try {
          $sql = "SELECT * FROM users";
          $st = $db->query($sql);


          foreach ($st as $row) {
            ?>

            <tr>
            
            <td data-target="login"><?php echo $row["login"]; ?></td>
            <td><a href="#" data-role='update' data-id=<?php echo $row['uid'];?> >Update</a></td>             
                </tr>
                    <?php

    }
    $db=null;
   }

catch(PDOException $e)
   {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}
?>

    </tbody>
  </table>

  
</div>

<?php
                            $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf8", $username, $password);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $reponse = $db->prepare("SELECT eid,nom,prenom,annee FROM enseignants ");
                            $reponse->execute();?>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>enseignants</label>
                <select  name="eid"  class="form-control from-control-sm">
                <?php
                              while($var=$reponse->fetch()){?>
                                  <option value=<?php echo  $var['eid'];?>>  <?php echo $var['nom']. " "; ?> <?php echo $var['prenom'] ." "; ?><?php echo "annee :" .$var['annee']; ?>
                                  </option>
                    <?php }?>
              </div>
              
                <input type="hidden" id="userId" class="form-control">
          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">valider</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

</body>

<script>
  $(document).ready(function(){

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var uid  = $(this).data('uid');
            var login  = $('#'+uid).children('td[data-target=login]').text();

            $('#login').val(login);
            $('#uid').val(uid);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var uid  = $('#userId').val(); 
         
          $.ajax({
              url      : 'login.php',
              method   : 'post', 
              data     : { uid: uid},
              success  : function(response){
                            // now update user record in table 
                             $('#'+uid).children('td[data-target=login]').text(login);
                             
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>

</html>
