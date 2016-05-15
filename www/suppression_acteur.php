<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression acteur</title>
  	</head>
  	<body>
		<h1>Supprimer un employé:</h1>
		<form method="post" action="suppression_acteur_traitement.php">
		    <p>
		       	<label for="acteur">Acteur à supprimer :</label><br />
		    	<select name="acteur">

		       	<?php
		       		$vConn = fConnect();
					$vSql ="Select numero_badge, nom, prenom
							FROM employe, acteur
							WHERE employe.numero_badge = acteur.numero_badge
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
