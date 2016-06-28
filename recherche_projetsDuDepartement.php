<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Projets d'un departement</title>
    </head>
    <body>
        <h1>Trouver tous les projets d'un departement :</h1>
        <form method="GET" action="recherche_projetsDuDepartement_traitement.php">
                <label for="departement">Choisissez un departement :</label><br />
                <select name="departement">
                    <?php
                        require "connect.php";
                        $conn = fConnect();
                        $sql = "SELECT nom, sigle FROM departement";
                        $query = pg_query($conn, $sql);
                        while ($result = pg_fetch_array($query)) {
                            echo "<option value=".$result['nom']."|".$result['sigle'].">".$result['nom']."</option>"; //on utilise le delimiteur | pour separer nom et sigle
                        }
                        pg_close($conn);
                    ?>
                </select>
            </p>
            <p>
                <input type="submit" value="Valider" >
            </p>
        </form>
        <a href="subject.html">Accueil</a>
    </body>
</html>
