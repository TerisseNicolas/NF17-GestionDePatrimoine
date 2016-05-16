<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau projet</title>
    </head>
    <body>
        <h1>Nouveau projet :</h1>
        <form method="post" action="insertion_projet_traitement.php">
            <p> 
                <label for="nom">Nom :</label>
                <input type="text" name="nom" size="30" maxlength="30" required/>
            </p>
            <p>
                <label for="sigle">Sigle :</label>
                <input type="text" name="sigle" size="30" maxlength="30" required/>
            </p>
            <p>
                <label for="description">Description :</label>
                <input type="text" name="description" size="50" maxlength="50" />
            </p>
            <p>
                <label for="dateD">Date début :</label>
                <input type="date" name="dateD" />
            </p>
            <p>
                <label for="dateF">Date fin :</label>
                <input type="date" name="dateF"  />
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
