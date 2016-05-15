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
					$vSql ="SELECT nom, sigle, MIN(count)
							FROM(
									SELECT COUNT(*)
									FROM laboratoire, machine
									WHERE machine.nomL = laboratoire.nom
									AND machine.sigleL = laboratoire.sigle
									GROUP BY (nom, sigle)
								); ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{
						echo "<p>Le laboratoire $result[0] ($result[1]) possède seulement $result[2] machine(s)</p>";
					}
					pg_close($vConn);
		       	?>
		</p>
		<p>
			<a href="index.html">Accueil</a>
		</p>
	</body>
</html>
