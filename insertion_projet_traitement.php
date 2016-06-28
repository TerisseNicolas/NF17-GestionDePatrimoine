<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouveau projet</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();

            //récuperation des données du formulaire
            $nom = $_POST['nom'];
            $sigle = $_POST['sigle'];
            $desc = $_POST['description'];
            $dateD = $_POST['dateD'];
            $dateF = $_POST['dateF'];
            $dpt = explode('|', $_POST['departement']); //on separe selon le delimiteur
            $labo = explode('|', $_POST['laboratoire']); //on separe selon le delimiteur
		echo $labo[0];
            $sql = "INSERT INTO description VALUES ('$desc', '$dateD', '$dateF');"; //on insere la description
            $sql .= "INSERT INTO projet VALUES ('$nom', '$sigle', '$desc', '$dpt[0]', '$dpt[1]', '$labo[0]', '$labo[1]');"; //puis le projet
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
