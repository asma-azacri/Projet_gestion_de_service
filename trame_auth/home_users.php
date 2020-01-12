
<?php
  require_once("auth/EtreAuthentifie.php");
  $title = 'accueil';
 include("../header.php");
?>
<?php
    include( "../db_config.php");
    $_SESSION['uid']=$idm->getUid();
     
      
  try{

      $db = new PDO("mysql:host=$host;dbname=$dbname;charest=UTF-8", $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT e.eid FROM `enseignants`e WHERE e.uid=".$_SESSION['uid'];
      $st = $db->query($sql);
      $res = $st->fetch();;
      $_SESSION['eid']=$res['eid'];


    $db=null;
  }
  catch(PDOException $e)
{
  print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
  die();
}

if(isset($_POST['annee'])){
  $_SESSION['annee']= $_POST['annee'];

}else{
  $_SESSION['annee']= "2019";

}

?>

<body>
 <div class="container-fluid">
     <div class="row">
        <div class=sidenav>
            <br>
            <br>
            <br>
            <br>
           
        
            <form method="post" style=" padding: 0;border: none;box-shadow: none;background: none;">

             <select class="browser-default custom-select" style = "width : 80%; color:blue;" name="annee" value =2019 onchange="this.form.submit();">   
                <option  value =2010>2010</option>
        
                <option <?php if($_SESSION['annee'] =='2011' ) echo 'selected'  ?> value =2011>2011</option>
        
                <option <?php if($_SESSION['annee'] =='2012' ) echo 'selected'  ?> value =2012>2012</option>
        
                <option <?php if($_SESSION['annee'] =='2013' ) echo 'selected'  ?>  value =2013>2013</option>
        
                <option <?php if($_SESSION['annee'] =='2014' ) echo 'selected'  ?>  value =2014>2014</option>
        
                <option <?php if($_SESSION['annee'] =='2015' ) echo 'selected'  ?> value =2015>2015</option>
        
                <option <?php if($_SESSION['annee'] =='2016' ) echo 'selected'  ?> value =2016>2016</option>
        
                <option <?php if($_SESSION['annee'] =='2017' ) echo 'selected'  ?>  value =2017>2017</option>
        
                <option <?php if($_SESSION['annee'] =='2018' ) echo 'selected'  ?> value =2018>2018</option>
        
                <option <?php if($_SESSION['annee'] =='2019' ) echo 'selected'  ?>   value =2019>2019</option>
        
                <option <?php if($_SESSION['annee'] =='2020' ) echo 'selected'  ?>  value =2020>2020</option>
               </select>
                </form>
          

          
                <br>

            <a href="../tab_bord/enseignant.php?eid=<?php echo  $_SESSION['eid']  ?>"><img style="height:30px" src="../image/cour.png"> les cours</a>
            <br>
            <a href="../tab_bord/mod_mdp.php?uid=<?php echo $_SESSION['uid']?>"><img style=height:40px src=../image/mdp.jpg> changer mot de passe  </a>

        </div>
      </div>
            <div class="col-sm-9  col-md-10 col-md-offset-2 main">
            <div class="row placeholders ">

<?php


$page_title= "informations";
     include( "../db_config.php");
     require("../db_config.php");
     $uid=$_SESSION['uid'];
     try {
          $db = new PDO("mysql:host=$host;dbname=$dbname;charest=utf-8", $username, $password);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT  e.nom, e.prenom ,e.email,e.tel FROM `enseignants` e WHERE  e.uid=$uid GROUP BY e.nom" ;
          $st = $db->prepare($sql);
          $st->execute();
          echo "<br>";
          echo "<br>";

          echo "<center>";
          echo "<div class=card>";
          echo "<img src=../image/prof1.jpg alt=Avatar style=width:100%>";

          foreach ($st as $row  ) {
               echo  "<h4><b>$row[nom]</b> </h4> ";
               echo  "<h4><b>$row[prenom]</b> </h4> ";
               echo "<h4><b>email:$row[email]</b></h4>";
              echo "<h4><b>tel:.$row[tel]</b></h4>";
           }

           echo"</div>";
           echo "</div>";
           echo "</div>";
           echo"</div>";
           echo "</div>";
           echo "</center>";
    $db=null;

} catch(PDOException $e) {
   print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
   die();
}

include ("../footer.php");

?>
