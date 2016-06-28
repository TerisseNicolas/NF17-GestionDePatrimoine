<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nombre d'employés</title>
    </head>
    <body>
        <h1>Nombre d'employés :</h1>
        <p>
            <?php
                require "connect.php";
                $conn = fConnect();
                $sql = "SELECT COUNT(*) FROM employe";
                $query = pg_query($conn, $sql);
                if (!$query) {
                    echo "<h1> Erreur lors de l'execution de requete! </h1>";
                }
                else {
                    $result = pg_fetch_row($query);
                    echo "Dans l'entreprise il y a ".$result[0]." employés.";
                }
                pg_close($conn);
            ?>     
        </p>
        <a href="subject.html">Accueil</a>
    </body>
</html>
