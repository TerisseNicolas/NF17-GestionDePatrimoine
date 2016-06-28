<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau chef de projet</title>
    </head>
    <body>
        <h1>Donner le role de chef de projet à un employé:</h1>
        <form method="post" action="insertion_chefDeProjet_traitement.php">
            <p>
                <label for="num_badge">Employé :</label> <br/>
                <select name="num_badge" required>
                <?php
                    require "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT * FROM employe";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result['numero_badge']."'>".$result['nom']." ".$result['prenom']."</option>";
                    }
                    pg_close($conn);
                ?>
                </select>
            </p>
            <p>      
                <label for="projet">Projet :</label><br/>
                <select name="projet" required>
                <?php
                    $conn = fConnect();
                    $sql = "SELECT * FROM projet";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result['nom']."'>".$result['nom']."</option>";
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
