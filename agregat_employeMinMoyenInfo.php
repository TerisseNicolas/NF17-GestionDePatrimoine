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
					$vSql ="SELECT nom, prenom, count
							FROM(
									SELECT employe.nom, prenom, COUNT(*)
									FROM employe, Moyens_Infos
									WHERE employe.numero_badge = Moyens_Infos.proprietaire
									GROUP BY numero_badge
								) temp
							ORDER BY count ASC LIMIT 1;";
					$vQuery=pg_query($vConn, $vSql);
					while ($result = pg_fetch_array($vQuery)) {
                        echo $result['nom']." ".$result['prenom']." est l'employé ayant le minimum de moyens informatiques (".$result['count'].").";
                    }
					pg_close($vConn);
		       	?>
		</p>
		<p>
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
