<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression projet</title>
  	</head>
  	<body>
		<h1>Supprimer un projet:</h1>
		<form method="post" action="suppression_projet_traitement.php">
		    <p>
		       	<label for="projet">Projet à supprimer :</label><br />
		    	<select name="projet">

		       	<?php
		       		$vConn = fConnect();
					$vSql ="Select nom 
							FROM projet
							ORDER BY nom; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<option value=\"$result[0]\">$result[0]</option>";
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
