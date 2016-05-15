<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Employé ayant le minimum de moyens informatiques</title>
  	</head>
  	<body>
		<h1>Employé ayant le minimum de moyens informatiques :</h1>
		<p>
			<?php
		       		$vConn = fConnect();
					$vSql ="SELECT nom, prenom, MIN(count)
							FROM(
									SELECT COUNT(*)
									FROM employe, Moyens_Infos
									WHERE employe.numero_badge = Moyens_Infos.proprietaire
									GROUP BY numero_bagde
								); ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<p>$result[0] $result[1] possède seulement $result[2] moyen(s) informatique(s)</p>";
					}
					pg_close($vConn);
		       	?>
		</p>
		<p>
			<a href="index.html">Accueil</a>
		</p>
	</body>
</html>
