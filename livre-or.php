<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "livreor");
if ($mysqli -> connect_errno){
    echo "failed to connect to my MySQL" .$mysqli -> connect_error; 
    exit();
}
    $request = $mysqli->query("SELECT `login`, `commentaires`, `date` FROM `commentaires` INNER JOIN `utilisateurs` ON `utilisateurs`.`id` = `commentaires`.`id_utilisateurs` ORDER BY date DESC");
    $results = $request->fetch_array(MYSQLI_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>
<body>
    <header><style type="text/css">
.tableau{height:350px;overflow:auto}
</style>
</header>
<nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="commentaire.php">Laisser un commentaire</a></li>
            <li><a href="profil.php">Modifier son profil</a></li>
            <li><a href="./logout.php">Se déconnecter</a></li>    
        </ul>
    </nav>
    <br>
    <div class = "tableau">
    <?php
        echo "<table border='5' solid green ><tr>";
    
    
        foreach ($results as $key => $value)
            {
            echo " <th> " . $key . " </th> ";
            }
            echo "</tr>";
            while ($results != NULL)
            {
            echo "<tr>";
            foreach ($results as $value)
            {
                    echo "<td style='min-width:200px; text-align:center;'>" . $value . "</td>";
            }
            echo "</tr>";
            $results = $request -> fetch_array(MYSQLI_ASSOC);
        }
        echo "</table>";
    ?>
    </div>

</body>
</html>