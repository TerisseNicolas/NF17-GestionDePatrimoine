<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modification directeur</title>
    </head>
    <body>
        <h1>Modification directeur :</h1>
        <br>
        <form method="post" action="update_directeur_traitement.php">
            <h2>Quel directeur ?</h2>
            <p>
                <label for="num_badge">Directeur à modifier :</label> <br/>
                <select name="num_badge" size=10 required>
                <?php
                    include "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT * FROM directeur";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo"toto";
                        echo "<option value='".$result[0]."'>".$result[0]." ".$result[1]." ".$result[3]."</option>";
                    }
                ?>
                </select>
            </p>
            <h2>Nouveau laboratoire : </h2>
            <p>
                <label for="laboratoire">Selectionnez un laboratoire si vous souhaitez le modifier :</label><br />
                <select name="laboratoire" size=10>
                <?php
                    $sql = "SELECT nom,sigle FROM laboratoire";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result[0]."'>".$result[0]." ".$result[1]."</option>";
                    }
                ?>
                </select>
            </p>
            <h2>Nouveau département : </h2>
            <p>
                <label for="departement">Selectionnez un département si vous souhaitez le modifier :</label><br />
                <select name="departement" size=10>
                <?php
                    $sql = "SELECT nom,sigle FROM departement";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result[0]."'>".$result[0]." ".$result[1]."</option>";
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


