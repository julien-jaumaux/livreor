<?php
include_once("include/bdd.php");



//-----------verification 
if(!empty($_POST['login']) && !empty($_POST['password'])){
    $login = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['login'])); 
    $password = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['password']));
    $requete = $mysqli->query("SELECT * FROM utilisateurs");
    while($resultat = $requete->fetch_assoc()){

        if($resultat['login'] == $login && $resultat['password'] == $password){
            $_SESSION['login'] = $resultat['login'];
            $_SESSION['password'] = $resultat['password'];
            $_SESSION['id'] = $resultat['id'];

            if($_POST['login'] == $resultat['login'] && $_POST['password'] == $resultat['password']){

                header('Location: livre-or.php');
            }
        }

    }

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>

    <?php include_once("include/header.php"); ?>

    <div id="container">
    <!-- zone de connexion -->
    
    <form action="connexion.php" method="POST">
    <h1>Connexion</h1>
    <label><b>Login</b></label>
    <input type="text" placeholder="Entrer le login" name="login" required>
    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
    <input type="submit" id='submit' name="submit" value='CONNEXION' >
    </form>
    </div>
    <?php


?>
    
    
</body>
</html>