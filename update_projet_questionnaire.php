<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modification projet</title>
    </head>
    <body>
        <h1>Modification projet :</h1>
        <br>
        <h2>Quel projet souhaitez-vous modifier ?</h2>
        <form method="post" action="update_projet_traitement.php">
            <p>
                <label for="nom_projet">Selectionnez un projet :</label><br />
                <select name="nom_projet" size=10>
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
            <h2>Remplissez les champs à modifier : </h2>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" size="30" maxlength="30"/>
            </p>
            <p>
                <label for="sigle">Sigle :</label>
                <input type="text" name="sigle" size="30" maxlength="30"/>
            </p>
            Si vous souhaitez modifier les dates de début et de fin entrez une descritpion
            <p>
                <label for="description">Description :</label><br />
               <input type="text" name="description" size="30" maxlength="30" required/>
            </p>
            <p>
                <label for="debut">Date de début :</label><br />
               <input type="text" name="debut" size="30" maxlength="30" required/>
            </p>
            <p>
                <label for="fin">Date de fin :</label><br />
               <input type="text" name="fin" size="30" maxlength="30" required/>
            </p>
            <p>
                <label for="departement">Departement :</label><br />
                <select name="departement" size=2>
                <?php
                    $sql = "SELECT sigle,nom FROM Departement"; 
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result[0]."'>".$result[0]." ".$result[1]."</option>";
                    }
                ?>
                </select>
            </p>
            <p>
                <label for="laboratoire">Laboratoire :</label><br />
                <select name="laboratoire" size=2>
                <?php
                    $sql = "SELECT sigle,nom FROM Laboratoire"; 
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result[0]."'>".$result[0]." ".$result[1]."</option>";
                    }
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
