<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Département ayant le plus d'employés</title>
  	</head>
  	<body>
		<h1>Département ayant le plus d'employés :</h1>
			<?php
					require "connect.php";
                    $conn = fConnect();
					$sql = "SELECT nomD, sigleD, COUNT(numero_badge)
							FROM Membre
							GROUP BY nomD, sigleD
							ORDER BY count DESC LIMIT 1;";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<p>Le département ".$result['nomd']." (".$result['sigled'].") possede ".$result['count']." employé(s)</p>";
                    }
                    pg_close($conn);
		       	?>
		<p>
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
