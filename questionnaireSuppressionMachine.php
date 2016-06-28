<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression Machine</title>
  	</head>
  	<body>
		<h1>Supprimer une machine :</h1>
		<form method="post" action="traitementSuppressionMachine.php">
		    <p>
		       	<label for="machine">Machine à supprimer :</label><br />
		    	<select name="machine">

		       	<?php
		       		$vConn = fConnect();
					$vSql ="SELECT modele, description 
							FROM machine
							ORDER by modele; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($result = pg_fetch_array($vQuery))
					{

						echo "<option value='".$result[0]."'>".$result[0]." : ".$result[1]."</option>";
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
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
