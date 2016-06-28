<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Suppression machine</title>
    </head>
    <body>        
        <?php
            include "connect.php";
            $conn = fConnect();

            //récuperation des données du formulaire
			$machine = $_POST['machine'];

            $sql = "DELETE FROM Machine WHERE modele = '$machine'";
            $query = pg_query($conn, $sql);
            if (!$query) {
                echo "<h1>Erreur lors de la suppression!</h1>";
            }
            else {
                echo "<h1>Suppression réussie!</h1>";
            }
            pg_close($conn);
        ?>
        </form>
        <a href="subject.html">Accueil</a>
    </body>
</html>