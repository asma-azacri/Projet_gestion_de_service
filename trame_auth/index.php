<?php

require("auth/EtreAuthentifie.php");

$title = 'accueil';
include("../header.php");
?>

<body>
<?php

  if($idm->getRole()=="admin"){
    include("home_admin.php");
  }else {
    include("home_users.php");
  }
  ?>

  <?php

  include("../footer.php");
  ?>
