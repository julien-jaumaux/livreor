<nav>
    <?php
    if (isset($_SESSION['login'])) {
        echo '<button><a href="./index.php">ACCUEIL</a></button>';
        echo '<button><a href="./profil.php">PROFIL</a></button>';
        echo "<button><a href='./livre-or.php'>COMMENTAIRES</a></button>";
        echo "<button><a href='./commentaire.php'>POSTER UN COMMENTAIRES</a></button>";
        echo '<button><a href="./logout.php">DECONNEXION</a></button>';
    } 
    else {
        echo '<button><a href="./index.php">ACCUEIL</a></button>';
        echo "<button><a href='./livre-or.php'>COMMENTAIRES</a></button>";
        echo '<button><a href="./connexion.php">SE CONNECTER</a></button>';
        echo "<button><a href='./inscription.php'>S'INSCRIRE</a></button>";
    } ?>
</nav>