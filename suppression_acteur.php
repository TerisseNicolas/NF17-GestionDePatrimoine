<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression acteur</title>
  	</head>
  	<body>
		<h1>Supprimer un acteur:</h1>
		<form method="post" action="suppression_acteur_traitement.php">
		    <p>
		       	<label for="acteur">Acteur à supprimer :</label><br />
		    	<select name="acteur">

		       	<?php
					require "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT employe.numero_badge, employe.nom, prenom
							FROM employe, acteur
							WHERE employe.numero_badge = acteur.numero_badge;";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value=".$result['numero_badge'].">".$result['nom']." ".$result['prenom']."</option>";
                    }
                    pg_close($conn);
		       	?>
		       	</select>
		    </p>
		    <p>
        		<input type="submit" value="Valider" >
    		</p>
		</form>
		<p>
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
