<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modification employé</title>
    </head>
    <body>
        <h1>Modification employé :</h1>
        <br>
        <h2>Quel profil d'employe souhaitez-vous modifier ?</h2>
        <form method="post" action="update_employe_traitement.php">
            <p>
                <label for="nom_employe">Selectionnez un Employe :</label><br />
                <select name="nom_employe" size=10>
                <?php
                    include "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT numero_badge,nom,prenom FROM employe";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value='".$result['numero_badge']."'>".$result['numero_badge']." ".$result['nom']." ".$result['prenom']."</option>";
                    }
                ?>
                </select>
            </p>
            <h2>Remplissez les champs à modifier : </h2>
            <p>
                <label for="num_badge">Numero badge :</label>
                <input type="text" name="num_badge" size="30" maxlength="30"/>
            </p>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" size="30" maxlength="30"/>
            </p>
            <p>
                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom" size="30" maxlength="30"/>
            </p>
            <p>
                <label for="email">Email :</label>
                <input type="text" name="email" size="30" maxlength="30"/>
            </p>
            <p>
                <label for="statut">Statut :</label><br />
                <select name="statut" size=3>
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                    <option value="Stagiaire">Stagiaire</option>
                </select>
            </p>
            <p>
                <label for="nom_salle">Nom salle :</label><br />
                <select name="nom_salle">
                <?php
                    $sql = "SELECT nom FROM salle"; 
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
