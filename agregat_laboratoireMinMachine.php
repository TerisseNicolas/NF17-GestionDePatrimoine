<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Laboratoire ayant le minimum de machines</title>
  	</head>
  	<body>
		<h1>Laboratoire ayant le minimum de machines</h1>
		<p>
			<?php
		       		$vConn = fConnect();
					$vSql ="SELECT nom, sigle, count
							FROM(
									SELECT nom, sigle, COUNT(*)
									FROM laboratoire, machine
									WHERE machine.nomL = laboratoire.nom
									AND machine.sigleL = laboratoire.sigle
									GROUP BY nom, sigle
								) temp
							ORDER BY count ASC LIMIT 1 ; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($result = pg_fetch_array($vQuery))
					{
						echo "Le laboratoire ".$result['nom']." (".$result['sigle'].") possède seulement ".$result['count']." machine(s).";
					}
					pg_close($vConn);
		       	?>
		</p>
		<p>
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
