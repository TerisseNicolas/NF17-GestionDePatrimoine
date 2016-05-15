<?php
	include "connect.php";
?>
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
		       	<label for="chefProjet">Employé à supprimer :</label><br />
		    	<select name="chefProjet">

		       	<?php
		       		$vConn = fConnect();
					$vSql ="Select numero_badge, nom, prenom
							FROM employe, Chef_de_projet
							WHERE employe.numero_badge = Chef_de_projet.numero_badge
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
