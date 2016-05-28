<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau directeur</title>
    </head>
    <body>
        <h1>Nouveau directeur:</h1>
        <form method="post" action="insertion_directeur_traitement.php">
            <p>
                <label for="num_badge">Employé :</label> <br/>
                <select name="num_badge" required>
                <?php
                    require "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT * FROM employe";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value=".$result['numero_badge'].">".$result['nom']." ".$result['prenom']."</option>";
                    }
                    pg_close($conn);
                ?>
                </select>
            </p>
            <p>
                <label for="departement">Departement :</label><br />
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
                <label for="laboratoire">Laboratoire :</label><br />
                <select name="laboratoire">
                    <?php
                        $conn = fConnect();
                        $sql = "SELECT nom, sigle FROM laboratoire";
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
        <a href="index.html"> Retour à l'accueil </a>
    </body>
</html>
