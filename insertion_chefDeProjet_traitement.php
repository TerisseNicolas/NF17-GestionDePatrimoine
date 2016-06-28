<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau employé</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();

            //récuperation des données du formulaire
            $num_badge = $_POST['num_badge'];
            $projet = $_POST['projet'];

            $sql = "INSERT INTO chef_de_projet VALUES ('$num_badge', '$projet')";
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
        <a href="subject.html">Accueil</a>
    </body>
</html>
