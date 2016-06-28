<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Nombre de membres pour chaque Département </title>
  	</head>
  	<body>
		<h1>Nombre de membres pour chaque Département :</h1>
		<p>
		
		
			<?php
		       		$vConn = fConnect();
					$vSql ="		SELECT nomD,COUNT(*)
									FROM Membre
									GROUP BY nomD;
								";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<p>Département: $result[0] .... $result[1] Membres dans ce Departement</p>";
					}
					
		       	?>
		</p>
		<p>
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
