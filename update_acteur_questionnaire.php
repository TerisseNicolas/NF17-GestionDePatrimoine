<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modification acteur</title>
    </head>
    <body>
        <h1>Modification acteur :</h1>
        <br>
        <form method="post" action="update_acteur_traitement.php">
            <h2>Quel acteur ?</h2>
            <p>
                <label for="num_badge">Employé :</label> <br/>
                <select name="num_badge" size=10 required>
                <?php
                    include "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT * FROM employe";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo"toto";
                        echo "<option value='".$result[0]."'>".$result[1]." ".$result[2]."</option>";
                    }
                ?>
                </select>
            </p>
            <h2>Quel projet?</h2>
            <p>
                <label for="nom_projet">Selectionnez un projet :</label><br />
                <select name="nom_projet" size=10 required>
                <?php
                    $sql = "SELECT nom,description FROM projet";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result[0]."'>".$result[0]." ".$result[1]."</option>";
                    }
                    pg_close($conn);
                ?>
                </select>
            </p>
            <p>
                <label for="role">Role :</label>
                <input type="text" name="role" size="30" maxlength="30"/>
            </p>
            <p>
                <input type="submit" value="Valider" >
            </p>
        </form>
        <a href="subject.html">Accueil</a>
    </body>
</html>
