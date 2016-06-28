<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression Moyens Informatiques</title>
  	</head>
  	<body>
		<h1>Supprimer un moyen informatique :</h1>
		<form method="post" action="traitementSuppressionMoyensInfos.php">
		    <p>
		       	<label for="moyens_infos">Moyens informatiques à supprimer :</label><br />
		    	<select name="moyens_infos">

		       	<?php
		       		$vConn = fConnect();
					$vSql ="SELECT nom, typeinfo 
							FROM moyens_infos
							ORDER by nom; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<option value=\"$result[0]\">$result[0]  $result[1]</option>";
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
