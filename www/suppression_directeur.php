<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression directeur</title>
  	</head>
  	<body>
		<h1>Supprimer un directeur:</h1>
		<form method="post" action="suppression_directeur_traitement.php">
		    <p>
		       	<label for="directeur">Directeur à supprimer :</label><br />
		    	<select name="directeur">

		       	<?php
		       		$vConn = fConnect();
					$vSql ="Select numero_badge, nom, prenom
							FROM employe, directeur
							WHERE employe.numero_badge = directeur.numero_badge
							ORDER by nom; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<option value=\"$result[0]\">$result[1]  $result[2]</option>";
					}
					pg_close($vConn);
		       	?>
		       	</select>
		    </p>
		    <p>
        		<input type="submit" value="Valider" >
    		</p>
		</form>
		<p>
			<a href="index.html">Accueil</a>
		</p>
	</body>
</html>
