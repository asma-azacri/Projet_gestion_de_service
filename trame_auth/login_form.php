<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> header </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../fun.js">
	<!--[if ltIE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<title><?= $title??"" ?></title>

</head>

<body>
<div id="container">

                <form method="post">
                        <!--legend>Authentifiez-vous</legend-->
                        <div id="container">
                         <center> <h3>Authentifiez-vous</h3></center>

                            <label for="inputNom" class="control-label"><b>Login</b></label>
                            <input type="text" name="login" size="20%" class="form-control" id="inputLogin" required placeholder="login"
                                   required value="<?= $data['login']??"" ?>">

                            <label for="inputMDP" class="control-label"><b>MDP</b></label>
                            <td><input type="password" name="password" size="20%" class="form-control" required id="inputMDP"
                                   placeholder="Mot de passe">


                          <div class="form-group">
                            <button type="submit"  style="width:100%" >Connexion</button>
                           
                        </div>
                    </form>
            </div>
    </div>

<?php

include("../footer.php");
