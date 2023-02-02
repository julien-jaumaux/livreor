<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "livreor");
if ($mysqli -> connect_errno){
    echo "failed to connect to my MySQL" .$mysqli -> connect_error; 
    exit();
}

?>

<hr>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page commentaires</title>
</head>
<body>
<nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="livre-or.php">Livre d'or</a></li>
            <li><a href="profil.php">Modifier son profil</a></li>
            <li><a href="./logout.php">Se déconnecter</a></li>    
        </ul>
    </nav>

    <div class="commentaire">

<form method="post" action="">

        <label for="commentaires"><b>COMMENTAIRE :</b></label><br>
        <textarea id="commentaires" name="commentaires" cols="100" rows="7"></textarea><br>
        
        <input type="submit" name="submit" value= "POSTER LE COMMENTAIRE">
</form> 
    </div>
    <br>
    
    <?php
        if($_POST)
        {
            $_POST['commentaires'] = addslashes($_POST['commentaires']);
            if(!empty($_POST['commentaires']))
            {
                $mysqli->query("INSERT INTO commentaires (id_utilisateurs, commentaires, date) VALUES ('$_SESSION[id]', '$_POST[commentaires]', NOW())") OR DIE ($mysqli->error);
                echo '<div class="validation">Votre commentaires a bien été enregistré.</div>';
            }
            else
            {
                echo '<div class="erreur">Afin de déposer un commentaire, veuillez svp remplir tous les champs du formulaire.</div>';              
            }
            
        }
    ?>

</body>
</html>