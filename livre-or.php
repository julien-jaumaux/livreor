<?php
include_once("include/bdd.php");

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
<?php include_once("include/header.php"); ?>


    <header><style type="text/css">

</style>
</header>



    <br>
    <div class = "tableau">
    <?php
		if(isset($_SESSION['login'])){?>
		<p><b>Bienvenue &nbsp; <?php echo $_SESSION['login'];}?></b></p>
        
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
            foreach ($results as $key => $value)
            {
                if($key == "date"){
                    $date = date_create($value);
                    $dateFormatFR = $date->format('d-m-Y');

                    // $explodeDateMA = explode('-', $date);
                    // $explodeJ = explode(' ',$explodeDateMA[2]);
                    // $newDateStr = $explodeJ[0].'/'.$explodeDateMA[1].'/'.$explodeDateMA[0];

                    echo "<td style='min-width:100px; text-align:center;'>".$dateFormatFR."</td>";
  
                }else{
                    echo "<td style='min-width:100px; text-align:center;'>" . $value . "</td>";

                }
            }
            echo "</tr>";
            $results = $request -> fetch_array(MYSQLI_ASSOC);
        }
        echo "</table>";
    ?>
    </div>

</body>
</html>