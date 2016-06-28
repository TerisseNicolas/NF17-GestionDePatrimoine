<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modification chef de projet</title>
    </head>
    <body>
        <h1>Modification chef de projet :</h1>
        <br>
        <form method="post" action="update_chefdeprojet_traitement.php">
            <h2>Quel projet?</h2>
            <p>
                <label for="nom_projet">Selectionnez un projet :</label><br />
                <select name="nom_projet" size=10 required>
                <?php
                    include "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT nom,description FROM projet";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result[0]."'>".$result[0]." ".$result[1]."</option>";
                    }
                ?>
                </select>
            </p>
            <h2>Quel chef ?</h2>
            <p>
                <label for="num_badge">Employé :</label> <br/>
                <select name="num_badge" size=10 required>
                <?php
                    $sql = "SELECT * FROM employe";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result['numero_badge']."'>".$result['nom']." ".$result['prenom']."</option>";
                    }
                    pg_close($conn);
                ?>
                </select>
            </p>
                <input type="submit" value="Valider" >
            </p>
        </form>
        <a href="subject.html">Accueil</a>
    </body>
</html>
