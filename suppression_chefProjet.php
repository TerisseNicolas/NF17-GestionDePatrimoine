<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression chef de projet</title>
  	</head>
  	<body>
		<h1>Supprimer un chef de projet:</h1>
		<form method="post" action="suppression_chefProjet_traitement.php">
		    <p>
		       	<label for="chefProjet">Chef de projet à supprimer :</label><br />
		    	<select name="chefProjet">

		       	<?php
					require "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT employe.numero_badge, nom, prenom
							FROM employe, Chef_de_projet
							WHERE employe.numero_badge = Chef_de_projet.numero_badge
							ORDER by nom;";
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
