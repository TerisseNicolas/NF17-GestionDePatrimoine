<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau employé</title>
    </head>
    <body>
        <h1>Nouveau employé :</h1>
        <form method="post" action="insertion_employe_traitement.php">
            <p>
                <label for="num_badge">Numero badge :</label>
                <input type="text" name="num_badge" size="30" maxlength="30" required/>
            </p>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" size="30" maxlength="30" />
            </p>
            <p>
                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom" size="30" maxlength="30" />
            </p>
            <p>
                <label for="email">Email :</label>
                <input type="text" name="email" size="30" maxlength="30" />
            </p>
            <p>
                <label for="statut">Statut :</label><br />
                <select name="statut">
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                    <option value="Stagiaire">Stagiaire</option>
                </select>
            </p>
            <p>
                <label for="nom_salle">Nom salle :</label><br />
                <select name="nom_salle">
                <?php
                    include "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT nom FROM salle"; //ne pas choisir de salle où la capacité est au max!
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
