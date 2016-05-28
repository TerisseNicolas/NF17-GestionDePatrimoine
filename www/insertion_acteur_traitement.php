<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau acteur</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();

            //récuperation des données du formulaire
            $num_badge = $_POST['num_badge'];
            $projet = $_POST['projet'];
            $role = $_POST['role'];

            $sql = "INSERT INTO acteur VALUES ('$num_badge', '$projet', '$role')";
            $query = pg_query($conn, $sql);
            if (!$query) {
                echo "<h1> Erreur lors de l'insertion! </h1>";
            }
            else {
                echo "<h1> Insertion réussie! </h1>";
            }
            pg_close($conn);
        ?>
        </form>
        <a href="index.html"> Retour à l'accueil </a>
    </body>
</html>
