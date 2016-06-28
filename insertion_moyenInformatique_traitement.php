<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau moyen informatique</title>
    </head>
    <body>        
        <?php
            include "connect.php";
            $conn = fConnect();

            //récuperation des données du formulaire
			$pseudo = $_POST['pseudo'];
			$typeMoyenInfo = $_POST['typeMoyenInfo'];
			$os = $_POST['os'];
			$responsable = $_POST['responsable'];
			$proprietaire = $_POST['proprietaire'];
			$lienMachine = $_POST['lienMachine'];
			$salle = $_POST['salle'];

            $sql = "INSERT INTO Moyens_Infos VALUES ('$pseudo', '$typeMoyenInfo', '$os', '$responsable', '$proprietaire', '$lienMachine', '$salle')";
            $query = pg_query($conn, $sql);
            if (!$query) {
                echo "<h1> Erreur lors de l'insertion! </h1>";
            }
            else {
                echo "<h1> Insertion réussie! </h1>";
            }
            pg_close($conn);
        ?>
        </form>
        <a href="subject.html">Accueil</a>
    </body>
</html>