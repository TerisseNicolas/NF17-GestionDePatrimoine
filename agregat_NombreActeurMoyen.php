<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Nombre d'acteurs moyens par projet </title>
  	</head>
  	<body>
		<h1>Nombre d'acteurs moyens par projet :</h1>
		<p>
		
		
			<?php
		       		$vConn = fConnect();
					$vSql ="		SELECT nom,COUNT(*)
									FROM Acteur
									GROUP BY nom ; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vresult = pg_fetch_array($vQuery))
					{

						echo "<p>Projet : ".$vresult[0].".... ".$vresult[1]." Acteurs pour ce projet</p>";
					}
					
		       	
				
			
		       		
					$vSql ="SELECT AVG(count)
							FROM(
									SELECT COUNT(*)
									FROM Acteur
									GROUP BY nom
								) AS acteurpardpt; ";
					$vquery=pg_query($vConn, $vSql);
					
					$result = pg_fetch_row($vquery);
					echo "<p>Ce qui nous fait une moyenne de ".$result[0]." Acteurs par Projet</p>";
					
					pg_close($vConn);
		       	?>
		</p>
		<p>
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
