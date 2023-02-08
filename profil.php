<?php
include_once("include/bdd.php");
$id = $_SESSION['id'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page profil</title>
</head>
<body>

    <?php include_once ("include/header.php");?>

    <div id="container">
    <!-- zone de connexion -->
    
    <form action="" method="POST">
    <h1>Modifier vos informations</h1>
    <label><b>Modifier login</b></label>
    <input type="text" name="login" value=<?php echo $_SESSION['login'];?> required>
    <label><b>Modifier mot de passe</b></label>
    <input type="password" name="password" value=<?php echo $_SESSION['password'];?> required>
    <label for="confirm_password"><b>Confirmer le Password</b></label>
    <input type="password" name="confirm_password" class="form-control form-control-lg" id="confirm_password">
    <input type="submit" id='submit' value="MODIFIER" name="submit" >
    </form>
    </div>
    <?php
    if(isset($_POST['submit'])){

        if($_POST['confirm_password'] != $_POST['password']){
            echo "<h2 style='color:white;text-align:center;'>Veuillez choisir deux password identiques!</h2>";
        }
    
        elseif(!empty($_POST['login']) && !empty($_POST['password'])){
    
    
        $login = $_POST['login'];
        $password = $_POST['password'];
        $id = $_SESSION['id'];
    
        $request = $mysqli->query("UPDATE utilisateurs SET login = '$login', password = '$password' WHERE id = '$id'");
        echo "<h2 style='color:white;text-align:center;'>Votre profil a bien été modifier!</h2>";
        }
        $requete = $mysqli->query("SELECT * FROM utilisateurs WHERE id= $id");
    $user = $requete->fetch_array(MYSQLI_ASSOC);
    
        $_SESSION = $user;
    
    }
    
    ?>

</body>
</html>