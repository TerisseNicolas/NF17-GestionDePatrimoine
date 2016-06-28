<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Nouvelle Machine</title>
    </head>
    <body>        
        <?php
            include "connect.php";
            $conn = fConnect();

            //récuperation des données du formulaire
			$modele = $_POST['modele'];
			$numcontrat = $_POST['contrat'];
			$des = $_POST['description'];
			$pui = $_POST['puissance'];
			$booltriphase = $_POST['triphase'];
			$boolgaz = $_POST['gaz'];
			$typegaz = $_POST['typegaz'];
			$taille = $_POST['taille'];
			$salle=$_POST['salle'];
			$labo = explode('|', $_POST['labo']); //on separe selon le delimiteur
			
			$tryphaseres = "FALSE";
			if($booltriphase == 't')
			{
				$tryphaseres  = "TRUE";
			}
			
			$gazres = "FALSE";
			if($boolgaz == 't')
			{
				$gazres  = "TRUE";
			}


            $sql = "INSERT INTO Machine VALUES ('$modele',$numcontrat,'$des',$pui,'$tryphaseres','$gazres','$typegaz','$taille','$salle','$labo[0]','$labo[1]')";
            $query = pg_query($conn,$sql);
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
