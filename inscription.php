<?php
include_once("include/bdd.php");

if(isset($_POST['submit'])){

    if($_POST['password'] != $_POST['confirm_password']){
        echo "Veuillez choisir deux password identiques";
    

    }
    elseif(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['password'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $request = $mysqli->query("INSERT INTO utilisateurs(nom,prenom,login,password) VALUES('$nom', '$prenom', '$login', '$password')");
    }


    header('location: connexion.php');

}


    


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>

    <?php include_once("include/header.php"); ?>

    <div id="container">
    <!-- zone de connexion -->
    
    <form action="" method="POST">
    <h1>Créer votre compte</h1>
    
    <label><b>Login</b></label>
    <input type="text" placeholder="Entrer le login" name="login" required>
    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
    <label for="confirm_password"><b>Confirmer le Password</b></label>
    <input type="password" name="confirm_password" class="form-control form-control-lg" id="confirm_password">
    <input type="submit" id='submit' value="S'INSCRIRE" name="submit" >

    </form>
    </div>

<?php
session_destroy();
?>
</body>
</html>