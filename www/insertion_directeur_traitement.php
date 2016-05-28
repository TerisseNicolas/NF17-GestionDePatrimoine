<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau directeur</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();

            //récuperation des données du formulaire
            $num_badge = $_POST['num_badge'];
            $dpt = explode('|', $_POST['departement']); //on separe selon le delimiteur
            $labo = explode('|', $_POST['laboratoire']); //on separe selon le delimiteur

            $sql = "INSERT INTO directeur VALUES ('$num_badge', '$dpt[0]', '$dpt[1]', '$labo[0]', '$labo[1]');";
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
