<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> adduser </title>

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
    <p class="error"><?= $error??""?></p>
    <div id="container">
    <form method="post">
        <h1><center>Inscription</center></h1>
        <div id="container">

                    <!--legend>Inscription</legend-->
        <table>
                    
                     <tr>
                        <td><label for="inputNom" class="control-label">Login</label></td>
                            <td><input class="input-field" type="text" name="login" class="form-control" id="inputNom" placeholder="login" required value="<?= $data['login']??""?>"></td>
                    </tr>
                    <tr>
                        <td><label for="inputNom" class="control-label">NOM</label></td>
                            <td><input class="input-field" type="text" name="nom" class="form-control" id="inputNom" placeholder="nom" required value="<?= $data['nom']??""?>"></td>
                    </tr>
                    <tr>
                        <td><label for="inputPrenom" class="control-label">Prenom</label></td>
                            <td><input class="input-field" type="text" name="prenom" class="form-control" id="inputprenom" placeholder="prenom" required value="<?= $data['prenom']??""?>"></td>
                    </tr>

                    <tr>
                        <td><label for="inputEmail" class="control-label">Email</label></td>
                            <td><input class="input-field" type="email" name="email" class="form-control" id="inputNom" placeholder="email" required value="<?= $data['email']??""?>"></td>
                    </tr>

                    <tr>
                        <td><label for="inputTel" class="control-label">Tel</label></td>
                            <td><input class="input-field" type="tel" name="tel" class="form-control" id="inputNom" placeholder="tel" required value="<?= $data['tel']??""?>"></td>
                    </tr>
                    <tr>
                        <td><label for="inputAnnee" class="control-label">Annee</label></td>
                            <td><input class="input-field" type="number" name="annee" class="form-control" id="inputNom" placeholder="annee" required value="<?= $data['annee']??""?>"></td>
                    </tr>

                    <tr>
                        <td><label for="inputEtid" class="control-label">type</label></td>
                            <td><select class="input-field" id="inputType" name="etid" placeholder="etid" required value="<?= $data['etid']??""?>">
                                     <option value=1>MCF</option>
                                     <option value=2>PR</option>
                                     <option value=3>ATER</option>
                                     <option value=4>VAC1</option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input class="input-field" type="password" name="mdp" class="form-control" id="inputMDP" placeholder="Mot de passe" required value=""></td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP2" class="control-label">Répéter MDP</label></td>
                            <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="Répéter le mot de passe" required value=""></td>
                    </tr>
                    
                 </table>
                    <div class="form-group">
                            <button type="submit" style="width:100%" >valider</button>
                    </div>
    </form>
    </div>

<?php

include("../footer.php");
